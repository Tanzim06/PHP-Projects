<?php
include_once dirname(__DIR__) . '/lib/ec_Database.php';
include_once dirname(__DIR__) .  '/helpers/ec_Format.php';
?>
<?php
class ClassCategory{
    private $db;
    private $frmt;
    
    public function __construct() {
        $this->db= new ec_Database;
        $this->frmt= new ec_Format();
    }
    
    public function CategoryInsert($CategoryName){
         $CategoryName= $this->frmt->validation($CategoryName);        
        $CategoryName= mysqli_real_escape_string($this->db->link, $CategoryName);
         if(empty($CategoryName)){
           $Categorymsg= "<span class='error'>Category field must not be empty</span>";
           return $Categorymsg;
    }else{
        $query= "INSERT INTO tbl_category(CatName) VALUES('$CategoryName')";
        $CategoryInsert= $this->db->insert($query);
        if($CategoryInsert){
            $msg= "<span class='success'>Category inserted successfully</span>";
            return $msg;
        }else{
             $msg= "<span class='error'>Category not Inserted</span>";
            return $msg;
        }
    }
    }
    public function GetAllCat(){
        $query= "SELECT * FROM tbl_category ORDER BY CatId";
        $CategorySelect= $this->db->select($query);
        return $CategorySelect;
    }
    public function GetCatById($id){
         $query= "SELECT * FROM tbl_category WHERE CatId= '$id' ";
        $CategorySelect= $this->db->select($query);
        return $CategorySelect;
    }
    
    public function CategoryUpdate($CategoryName, $id ){
         $CategoryName= $this->frmt->validation($CategoryName);        
        $CategoryName= mysqli_real_escape_string($this->db->link, $CategoryName);
        $Id= mysqli_real_escape_string($this->db->link, $id);
         if(empty($CategoryName)) {
           $Categorymsg= "<span class='error'>Category field must not be empty</span>";
           return $Categorymsg;
    }else{
        $query= "UPDATE tbl_category SET CatName= '$CategoryName' WHERE CatId='$id' ";
        $updated_row= $this->db->update($query);
        if($updated_row){
            $msg= "<span class='success'>Category updated successfully</span>";
            return $msg;
        }else{
            $msg= "<span class='error'>Category not updated</span>";
            return $msg;
        }
    }
  }
  public function DelCatById($id){
      $query="DELETE FROM tbl_category WHERE CatId='$id' ";
      $deldata= $this->db->delete($query);
      if($deldata){
          $msg= "<span class='error'>Category deleted successfully</span>";
            return $msg;
      }else{
          $msg= "<span class='error'>Category not deleted</span>";
            return $msg;
      }
  }
}
?>