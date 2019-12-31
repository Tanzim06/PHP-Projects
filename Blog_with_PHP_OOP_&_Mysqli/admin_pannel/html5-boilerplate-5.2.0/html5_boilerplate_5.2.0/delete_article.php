<?php include '../../../../lib/BlogSession.php';
 BlogSession::checkSession();
?>
<?php
include'../../../../config/config.php';
include'../../../../lib/BlogDatabase.php';
include'../../../../helpers/BlogFolmat.php';
?>
<?php
$db=new BlogDatabase();
?>
<?php
if(!isset($_GET['delpostid']) || $_GET['delpostid']==NULL){
    header("Location:article_list.php");
} else{
    $articleid= $_GET['delpostid'];
    
    $query= "SELECT * FROM tbl_post WHERE id= '$articleid' ";
    $getdata= $db->select($query);
    if($getdata){
        while($delimg= $getdata->fetch_assoc()){
            $dellink= $delimg['image'];
            unlink($dellink);
        }
    }
    $delquery= "DELETE FROM tbl_post WHERE id= '$articleid' ";
    $deldata= $db->delete($delquery);
    if($deldata){
        echo "<script>alert('Data deleted successfully.')</script>";
       header("Location:article_list.php");
    }else{
        echo "<script>alert('Data not deleted')</script>";
       header("Location:article_list.php");
    }
}
?>