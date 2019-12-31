<?php include '../../../../lib/BlogSession.php';
 BlogSession::checkSession();
?>
<?php
include'../../../../config/config.php';
include'../../../../lib/BlogDatabase.php';
?>
<?php
$db=new BlogDatabase();
?>
<?php
if(!isset($_GET['delete_page']) || $_GET['delete_page']==NULL){
    header("Location:Index.php");
} else{
    $pageid= $_GET['delete_page'];
    
    $delquery="DELETE FROM tbl_page where id='$pageid' ";
    $deldata= $db->delete($delquery);
    if($deldata){
        echo "<script>alert('Page deleted successfully.')</script>";
        header("Location:Index.php");
    }else{
        echo "<script>alert('Page not deleted.')</script>";
        header("Location:Index.php");
    }
}
?>

