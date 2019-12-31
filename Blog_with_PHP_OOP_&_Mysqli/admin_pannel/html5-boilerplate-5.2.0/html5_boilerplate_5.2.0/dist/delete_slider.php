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
if(!isset($_GET['sliderid']) || $_GET['sliderid']==NULL){
    header("Location:slider_list.php");
} else{
    $sliderid= $_GET['sliderid'];
    
    $query= "SELECT * FROM tbl_slider WHERE id='$sliderid' ";
    $getdata= $db->select($query);
    if($getdata){
        while($delimg= $getdata->fetch_assoc()){
            $dellink=$delimg['image'];
            unlink($dellink);
        }
    }
    $delquery="DELETE FROM tbl_slider where id='$sliderid' ";
    $deldata= $db->delete($delquery);
    if($deldata){
        echo "<script>alert('slider deleted successfully.')</script>";
        header("Location:slider_list.php");
    }else{
        echo "<script>alert('Slider not deleted.')</script>";
        header("Location:slider_list.php");
    }
}
?>
