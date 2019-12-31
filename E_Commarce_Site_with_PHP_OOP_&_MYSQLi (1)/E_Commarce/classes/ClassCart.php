<?php
include_once dirname(__DIR__) . '/lib/ec_Database.php';
include_once dirname(__DIR__) .  '/helpers/ec_Format.php';
Class ClassCart{
    private $db;
    private $fm;
    
    public function __construct() {
        $this->db= new ec_Database();
        $this->fm= new ec_Format();
    }
    public function AddToCart($Quantity, $id){
        $Quantity= $this->fm->validation($Quantity);        
        $Quantity= mysqli_real_escape_string($this->db->link, $Quantity);
        $ProductId= mysqli_real_escape_string($this->db->link, $id);
        $SessionId= session_id();
        
        $selectproduct= "SELECT * FROM tbl_product WHERE ProductId='$ProductId' ";
        $result= $this->db->select($selectproduct)->fetch_assoc();
        $ProductName= $result['ProductName'];
        $Price= $result['Price'];
        $Image= $result['Image'];
        
        $Checkquery= "SELECT * FROM tbl_cart WHERE ProductId= '$ProductId' AND SessionId='$SessionId' ";
        $Checkpro=$this->db->select($Checkquery);
        if($Checkpro){
            $Checkmsg="Product allready added !";
            return $Checkmsg;
        } else {
        $query= "INSERT INTO tbl_cart(SessionId, ProductId, ProductName, Price, Quantity, Image) VALUES('$SessionId', '$ProductId', '$ProductName', '$Price', '$Quantity', '$Image')";
        $CartInsert= $this->db->insert($query);
        if($CartInsert){
            header('Location: cart.php');
        }else{
            header('Location: 404_error.php');
      }
    }
   }
    public function GetCartProduct(){
        $SessionId= session_id();
        $query= "SELECT * FROM tbl_cart WHERE SessionId= '$SessionId' ";
        $CartProduct= $this->db->select($query);
        return $CartProduct;
    }
    public function UpdateCartQuantity($Quantity, $CartId){
        $Quantity= $this->fm->validation($Quantity);        
        $CartId= $this->fm->validation($CartId);        
        $Quantity= mysqli_real_escape_string($this->db->link, $Quantity);
        $CartId= mysqli_real_escape_string($this->db->link, $CartId);
        
         $query= "UPDATE tbl_cart SET Quantity= '$Quantity' WHERE CartId='$CartId' ";
        $updated_row= $this->db->update($query);
        if($updated_row){
            header('Location: cart.php');
        }else{
            $msg= "<span class='error'> Quantity not updated</span>";
            return $msg;
        }
    }
    public function DelProductFromCart($DelId){
      $query="DELETE FROM tbl_cart WHERE CartId='$DelId' ";
      $deldata= $this->db->delete($query);
      if($deldata){
          echo"<script>window.location='cart.php'</script>";
      }else{
          $msg= "<span class='error'>Product not deleted</span>";
            return $msg;
      }
    }
    public function CheckCart(){
        $SessionId= session_id();
        $query= "SELECT * FROM tbl_cart WHERE SessionId= '$SessionId' ";
        $result= $this->db->select($query);
        return $result;
    }
    public function DelCustomerCart(){
        $SessionId= session_id();
        $query="DELETE FROM tbl_cart WHERE SessionId='$SessionId'";
        $this->db->delete($query);
    }
    public function OrderProduct($CustId){
        $SessionId= session_id();
        $query= "SELECT * FROM tbl_cart WHERE SessionId='$SessionId' ";
        $Getpro=$this->db->select($query);
        if($Getpro){
            while($result= $Getpro->fetch_assoc()){
                $ProductId= $result['ProductId'];
                $ProductName= $result['ProductName'];
                $Quantity= $result['Quantity'];
                $Price= $result['Price']*$Quantity;
                $Image= $result['Image'];
        $query= "INSERT INTO tbl_order(CustId, ProductId, ProductName, Quantity, Price, Image) VALUES('$CustId', '$ProductId', '$ProductName', '$Quantity', '$Price', '$Image')";
        $OrderInsert= $this->db->insert($query);
            }
        }  
    }
    public function PaybleAmount($CustId){
        $query= "SELECT Price FROM tbl_order WHERE CustId= '$CustId' AND Date= now()";
        $result= $this->db->select($query);
        return $result;
    }
    public function GetOrderedProduct($CustId){
        $query= "SELECT * FROM tbl_order WHERE CustId= '$CustId' ORDER BY Date DESC";
        $result= $this->db->select($query);
        return $result;
    }
    public function CheckOrder($CustId){
        $query= "SELECT * FROM tbl_order WHERE CustId= '$CustId' ";
        $result= $this->db->select($query);
        return $result;
    }
    public function GetAllOrderProduct(){
        $query= "SELECT * FROM tbl_order ORDER BY Date ";
        $result= $this->db->select($query);
        return $result;
    }
    public function ProductShifted($id, $date, $price){
        $id= $this->fm->validation($id);        
        $date= $this->fm->validation($date);
        $price= $this->fm->validation($price);
        $id= mysqli_real_escape_string($this->db->link, $id);
        $date= mysqli_real_escape_string($this->db->link, $date);
        $price= mysqli_real_escape_string($this->db->link, $price);
        $query= "UPDATE tbl_order SET Status= '2' WHERE Id='$id' AND Date='$date' AND Price='$price'";
        $updated_row= $this->db->update($query);
        if($updated_row){
            $msg= "<span class='success'>Status updated successfully</span>";
            return $msg;
        }else{
            $msg= "<span class='error'>Status not updated</span>";
            return $msg;
        }
    }
    public function ProductShiftConfirm($id, $date, $price){
        $id= $this->fm->validation($id);        
        $date= $this->fm->validation($date);
        $price= $this->fm->validation($price);
        $id= mysqli_real_escape_string($this->db->link, $id);
        $date= mysqli_real_escape_string($this->db->link, $date);
        $price= mysqli_real_escape_string($this->db->link, $price);
        $query= "UPDATE tbl_order SET Status= '3' WHERE Id='$id' AND Date='$date' AND Price='$price'";
        $updated_row= $this->db->update($query);
        if($updated_row){
            $msg= "<span class='success'>Status updated successfully</span>";
            return $msg;
        }else{
            $msg= "<span class='error'>Status not updated</span>";
            return $msg;
        }
    }
    public function DelProductShifted($id, $date, $price){
        $id= $this->fm->validation($id);        
        $date= $this->fm->validation($date);
        $price= $this->fm->validation($price);
        $id= mysqli_real_escape_string($this->db->link, $id);
        $date= mysqli_real_escape_string($this->db->link, $date);
        $price= mysqli_real_escape_string($this->db->link, $price);
        
        $query="DELETE FROM tbl_order WHERE Id='$id' AND Price='$price' AND Date='$date'";
      $deldata= $this->db->delete($query);
      if($deldata){
          $msg= "<span class='error'>Data deleted successfully</span>";
            return $msg;
      }else{
          $msg= "<span class='error'>Data not deleted</span>";
            return $msg;
      }
    }
}

