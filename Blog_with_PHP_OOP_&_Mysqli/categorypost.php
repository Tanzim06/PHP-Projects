<?php include './inc/header.php' ?>;
<?php
$categoryid= mysqli_real_escape_string($db->link, $_GET['category']);
if(!isset($categoryid) || $categoryid == NULL){
   header("Location: 404_error.php");
}else{
    $category= $categoryid;
}
               
?>
<div class="contentsection contemplete clear">
            <div class="maincontent clear">
                 <?php
                $query= "SELECT * FROM tbl_post WHERE cat= $category AND status= '2' ";
                $post= $db->select($query); 
                if($post ){
               
               while($result= $post->fetch_assoc()){
                ?>
                 <div class="samepost clear">
                    <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title'];?></a></h2>
                    <h4><?php echo $fm->formatDate($result['date']); ?>,  By <a href=""><?php echo $result['author']; ?></a></h4>
                    <a href=""><img src="admin_pannel/<?php echo str_replace('../../../','', $result['image'])  ?>" alt="post Image"></a>
                    
                   <?php echo $fm->TextShorting($result['body']); ?>
                    
                 <div class="readmore clear">
                     <a href="post.php?id=<?php echo $result['id']; ?>">Read more...</a>
                 </div>
  </div>
<?php  }  } else{ ?>
                <h3>No posts available in this category</h3>
<?php } ?>
</div>
<?php include './inc/sidebar.php'; ?></div>
<?php include './inc/footer.php'; ?>