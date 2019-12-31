<?php
include_once dirname(__DIR__) . '/lib/ec_Database.php';
include_once dirname(__DIR__) .  '/helpers/ec_Format.php';
?>
<?php
class ClassBrand{
    private $db;
    private $frmt;
    
    public function __construct() {
        $this->db= new ec_Database;
        $this->frmt= new ec_Format();
    }
     public function BrandInsert($BrandName){
         $BrandName= $this->frmt->validation($BrandName);        
        $BrandName= mysqli_real_escape_string($this->db->link, $BrandName);
         if(empty($BrandName)){
           $Brandmsg= "<span class='error'>Brand field must not be empty</span>";
           return $Brandmsg;
    } else {
        $query= "INSERT INTO tbl_brand(BrandName) VALUES('$BrandName')";
        $BrandInsert= $this->db->insert($query);
        if($BrandInsert){
            $msg= "<span class='success'>Brand inserted successfully</span>";
            return $msg;
        }else{
             $msg= "<span class='error'>Brand not Inserted</span>";
            return $msg;
        }
    }
    }
        public function GetAllBrand(){
        $query= "SELECT * FROM tbl_brand ORDER BY BrandId";
        $BrandSelect= $this->db->select($query);
        return $BrandSelect;
    }
    public function GetBrandById($id){
         $query= "SELECT * FROM tbl_brand WHERE BrandId= '$id' ";
        $BrandSelect= $this->db->select($query);
        return $BrandSelect;
    }
    
    public function BrandUpdate($BrandName, $id ){
         $CategoryName= $this->frmt->validation($BrandName);        
        $CategoryName= mysqli_real_escape_string($this->db->link, $BrandName);
        $Id= mysqli_real_escape_string($this->db->link, $id);
         if(empty($BrandName)) {
           $Brandmsg= "<span class='error'>Brand field must not be empty</span>";
           return $Brandmsg;
    }else{
        $query= "UPDATE tbl_brand SET BrandName= '$BrandName' WHERE BrandId='$id' ";
        $updated_row= $this->db->update($query);
        if($updated_row){
            $msg= "<span class='success'>Brand updated successfully</span>";
            return $msg;
        }else{
            $msg= "<span class='error'>Brand not updated</span>";
            return $msg;
        }
    }
  }
  
  public function DelBrandById($id){
      $query="DELETE FROM tbl_brand WHERE BrandId='$id' ";
      $deldata= $this->db->delete($query);
      if($deldata){
          $msg= "<span class='error'>Brand deleted successfully</span>";
            return $msg;
      }else{
          $msg= "<span class='error'>Brand not deleted</span>";
            return $msg;
      }
  }
}