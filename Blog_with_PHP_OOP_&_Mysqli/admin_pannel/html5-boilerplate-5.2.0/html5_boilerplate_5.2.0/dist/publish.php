<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<?php
if(isset($_GET['status_id'])){
    $post_id=$_GET['status_id'];
      $query= "UPDATE tbl_post SET status= '2' WHERE id= '$post_id' ";
                               $catupdate= $db->update($query);
                                     if($catupdate){
                                         echo"<span class='success'>Post have been published</span>";
                                     }else{
                                         echo"<span class='error'>Something wrong!!</span>";
                                     }
}
