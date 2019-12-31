<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<?php
if(isset($_GET['status_id'])){
    $post_id=$_GET['status_id'];
      $query= "UPDATE tbl_post SET status= '1' WHERE id= '$post_id' ";
                               $catupdate= $db->update($query);
                                     if($catupdate){
                                         echo"<span class='error'>Post have been Unpublished</span>";
                                     }else{
                                         echo"<span class='error'>Something wrong!!</span>";
                                     }
}

