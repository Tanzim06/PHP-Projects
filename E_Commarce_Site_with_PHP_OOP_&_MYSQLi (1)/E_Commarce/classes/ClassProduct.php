<?php
include_once dirname(__DIR__) . '/lib/ec_Database.php';
include_once dirname(__DIR__) .  '/helpers/ec_Format.php';
?>
<?php
class ClassProduct{
    private $db;
    private $frmt;
    
    public function __construct() {
        $this->db= new ec_Database();
        $this->frmt= new ec_Format();
    }
    public function ProductInsert($data, $file){
        $ProductName= mysqli_real_escape_string($this->db->link, $data['ProductName']);
        $CatId= mysqli_real_escape_string($this->db->link, $data['CatId']);
        $BrandId= mysqli_real_escape_string($this->db->link, $data['BrandId']);
        $Body= mysqli_real_escape_string($this->db->link, $data['editor1']);
        $Type= mysqli_real_escape_string($this->db->link, $data['Type']);
        $Price= mysqli_real_escape_string($this->db->link, $data['Price']);
        
        
        $ProductName= $this->frmt->validation($ProductName); 
        $CatId= $this->frmt->validation($CatId); 
        $BrandId= $this->frmt->validation($BrandId); 
        $Body= $this->frmt->validation($Body); 
        $Type= $this->frmt->validation($Type); 
        $Price= $this->frmt->validation($Price);
        
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "../../admin_pannel/uploads/images".$unique_image;
    
    if($ProductName == "" || $CatId == "" || $BrandId == "" || $Body == "" ||  $file_name="" || $Type == "" || $Price == "" ){
         $Productmsg= "<span class='error'>Field must not be empty</span>";
         return $Productmsg;
    }elseif ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }else{
        move_uploaded_file($file_temp, $uploaded_image);
        $query= "INSERT INTO tbl_product(ProductName, CatId, BrandId, Body, Price, Image, Type) VALUES('$ProductName', '$CatId', '$BrandId', '$Body', '$Price', '$uploaded_image', '$Type')";
        $ProductInsert= $this->db->insert($query);
        if($ProductInsert){
            $msg= "<span class='success'>Product inserted successfully</span>";
            return $msg;
        }else{
             $msg= "<span class='error'>Product not Inserted</span>";
            return $msg;
      }
    }
  }
  public function GetAllProduct(){
      $query= "SELECT p.*, c.CatName, b.BrandName FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.CatId = c.CatId AND p.BrandId = b.BrandId
                     ORDER BY p.ProductId";// this is query by alias
      
      /*$query="SELECT tbl_product.*, tbl_category.CatName, tbl_brand.BrandName  // this is general query
              FROM tbl_product INNER JOIN tbl_category
              ON tbl_product.CatId = tbl_Category.CatId
              INNER JOIN tbl_brand
              ON tbl_product.BrandId=tbl_brand.BrandId
              ORDER BY tbl_product.ProductId";*/
      $result= $this->db->select($query);
      return $result;
  }
  
  public function GetProductById($id){
      $query= "SELECT * FROM tbl_product WHERE ProductId= '$id' ";
        $ProductSelect= $this->db->select($query);
        return $ProductSelect;
  }
  
  public function ProductUpdate($data, $file, $id){
        $ProductName= mysqli_real_escape_string($this->db->link, $data['ProductName']);
        $CatId= mysqli_real_escape_string($this->db->link, $data['CatId']);
        $BrandId= mysqli_real_escape_string($this->db->link, $data['BrandId']);
        $Body= mysqli_real_escape_string($this->db->link, $data['editor1']);
        $Type= mysqli_real_escape_string($this->db->link, $data['Type']);
        $Price= mysqli_real_escape_string($this->db->link, $data['Price']);
        
        
        $ProductName= $this->frmt->validation($ProductName); 
        $CatId= $this->frmt->validation($CatId); 
        $BrandId= $this->frmt->validation($BrandId); 
        $Body= $this->frmt->validation($Body); 
        $Type= $this->frmt->validation($Type); 
        $Price= $this->frmt->validation($Price);
        
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "../../admin_pannel/uploads/images".$unique_image;
    
    if($ProductName == "" || $CatId == "" || $BrandId == "" || $Body == "" || $Type == "" || $Price == "" ){
         $Productmsg= "<span class='error'>Field must not be empty</span>";
         return $Productmsg;
    }else{
        if(!empty($file_name)){
    if ($file_size >1048567) {
     echo "<span class='error'>Image Size should be less then 1MB!
     </span>";
    } elseif (in_array($file_ext, $permited) === false) {
     echo "<span class='error'>You can upload only:-"
     .implode(', ', $permited)."</span>";
    }else{
        move_uploaded_file($file_temp, $uploaded_image);
        $query="UPDATE tbl_product
                     SET
                     ProductName='$ProductName',
                     CatId='$CatId',
                     BrandId='$BrandId',
                     Body='$Body',
                     Price='$Price',
                     Image='$uploaded_image',
                     Type='$Type'
                     WHERE ProductId='$id' ";
        $ProductUpdate= $this->db->update($query);
        if($ProductUpdate){
            $msg= "<span class='success'>Product updated successfully</span>";
            return $msg;
        }else{
             $msg= "<span class='error'>Product not updated</span>";
            return $msg;
      }
    }
    }else{
         $query="UPDATE tbl_product
                     SET
                     ProductName='$ProductName',
                     CatId='$CatId',
                     BrandId='$BrandId',
                     Body='$Body',
                     Price='$Price',
                     Type='$Type'
                     WHERE ProductId='$id' ";
        $ProductUpdate= $this->db->update($query);
        if($ProductUpdate){
            $msg= "<span class='success'>Product updated successfully</span>";
            return $msg;
        }else{
             $msg= "<span class='error'>Product not updated</span>";
            return $msg;
     }
    }
   }
  }
  
  public function DelProductById($id){
      $query="SELECT * FROM tbl_product WHERE ProductId='$id' ";
      $GetData= $this->db->select($query);
      if($GetData){
          while($delImg=$GetData->fetch_assoc()){
              $dellink= $delImg['Image'];
              unlink($dellink);
          }
      }
      $delquery="DELETE FROM tbl_product WHERE ProductId='$id' ";
      $deldata= $this->db->delete($delquery);
      if($deldata){
          $msg= "<span class='error'>Product deleted successfully</span>";
            return $msg;
      }else{
          $msg= "<span class='error'>Product not deleted</span>";
            return $msg;
      }
  }
  public function GetFeturedProduct(){
      $query= "SELECT * FROM tbl_product WHERE type='1' ORDER BY ProductId LIMIT 4";
        $ProductSelect= $this->db->select($query);
        return $ProductSelect;
  }
  public function GetNewProduct(){
      $query= "SELECT * FROM tbl_product ORDER BY ProductId DESC LIMIT 4";
        $ProductSelect= $this->db->select($query);
        return $ProductSelect;
  }
  public function GetSingleProduct($id){
      $query= "SELECT p.*, c.CatName, b.BrandName FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.CatId = c.CatId AND p.BrandId = b.BrandId AND p.ProductId = '$id' "; // this is query by alias
       $result= $this->db->select($query);
       return $result;
  }
  public function LetestFromIphone(){
      $query= "SELECT * FROM tbl_product WHERE BrandId='1' ORDER BY ProductId DESC LIMIT 1";
        $ProductSelect= $this->db->select($query);
        return $ProductSelect;
  }
  public function LetestFromSamsung(){
      $query= "SELECT * FROM tbl_product WHERE BrandId='2' ORDER BY ProductId DESC LIMIT 1";
        $ProductSelect= $this->db->select($query);
        return $ProductSelect;
  }
  public function LetestFromAcer(){
      $query= "SELECT * FROM tbl_product WHERE BrandId='4' ORDER BY ProductId DESC LIMIT 1";
        $ProductSelect= $this->db->select($query);
        return $ProductSelect;
  }
  public function LetestFromCanon(){
      $query= "SELECT * FROM tbl_product WHERE BrandId='5' ORDER BY ProductId DESC LIMIT 1";
        $ProductSelect= $this->db->select($query);
        return $ProductSelect;
  }
  public function ProductByCat($id){
      $Catid= $this->frmt->validation($id); 
      $Catid= mysqli_real_escape_string($this->db->link, $id);
      $query= "SELECT * FROM tbl_product WHERE Catid= '$Catid' ";
        $ProductSelect= $this->db->select($query);
        return $ProductSelect;
  }
  public function InsertCompareData($compareid, $CustId){
      $CustId= $this->frmt->validation($CustId);
      $Productid= $this->frmt->validation($compareid);
      $CustId= mysqli_real_escape_string($this->db->link, $CustId);
      $ProductId= mysqli_real_escape_string($this->db->link, $compareid);
      
      $CheckQuery= "SELECT * FROM tbl_compare WHERE CustId='$CustId' AND ProductId='$ProductId' ";
       $Check=$this->db->select($CheckQuery);
       if($Check){
           $msg= "<span class='error'>Alradey added</span>";
            return $msg;
       }
      $query= "SELECT * FROM tbl_product WHERE ProductId='$ProductId' ";
        $result=$this->db->select($query)->fetch_assoc();
        if($result){
                $ProductId= $result['ProductId'];
                $ProductName= $result['ProductName'];
                $Price= $result['Price'];
                $Image= $result['Image'];
        $query= "INSERT INTO tbl_compare(CustId, ProductId, ProductName, Price, Image) VALUES('$CustId', '$ProductId', '$ProductName', '$Price', '$Image')";
        $CompareInsert= $this->db->insert($query);
            if($CompareInsert){
                $msg= "<span class='success'>Added to compare successfully</span>";
            return $msg;
      }else{
          $msg= "<span class='error'>Not added</span>";
            return $msg;
            }
           }
          }
         public function GetCompareData($CustId){
             $query="SELECT * FROM tbl_compare WHERE CustId='$CustId'ORDER BY Id DESC";
             $result= $this->db->select($query);
             return $result;
         }
         public function DelCompareData($CustId){
      $delquery="DELETE FROM tbl_compare WHERE CustId='$CustId' ";
      $deldata= $this->db->delete($delquery);
         }
         public function SaveWishList($id, $CustId){
       $CheckQuery= "SELECT * FROM tbl_wlist WHERE CustId='$CustId' AND ProductId='$id' ";
       $Check=$this->db->select($CheckQuery);
       if($Check){
           $msg= "<span class='error'>Alradey added</span>";
            return $msg;
       }
        $query= "SELECT * FROM tbl_product WHERE ProductId='$id' ";
        $result=$this->db->select($query)->fetch_assoc();
        if($result){
                $ProductId= $result['ProductId'];
                $ProductName= $result['ProductName'];
                $Price= $result['Price'];
                $Image= $result['Image'];
        $query= "INSERT INTO  tbl_wlist(CustId, ProductId, ProductName, Price, Image) VALUES('$CustId', '$ProductId', '$ProductName', '$Price', '$Image')";
        $WishlistInsert= $this->db->insert($query);
        if($WishlistInsert){
                $msg= "<span class='success'>Added to wishlist successfully</span>";
            return $msg;
      }else{
          $msg= "<span class='error'>Not added</span>";
            return $msg;
            }
           }  
          }
          public function CheckWishList($CustId){
              $query="SELECT * FROM tbl_wlist WHERE CustId='$CustId'ORDER BY Id DESC";
             $result= $this->db->select($query);
             return $result;
          }
          public function DelWlistData($CustId, $ProductId){
              $delquery="DELETE FROM tbl_wlist WHERE CustId='$CustId' AND ProductId='$ProductId'";
              $deldata= $this->db->delete($delquery);
          }
         public function GetSearchedproduct($search){
             $query= "SELECT * FROM tbl_product WHERE ProductName LIKE '%$search%' OR Body LIKE '%$search%' ";
             $searchproduct= $this->db->select($query); 
             return $searchproduct;
          }
         }