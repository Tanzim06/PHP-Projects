<?php include './inc/header.php' ?>
<?php
$postid= mysqli_real_escape_string($db->link, $_GET['id']);
if(!isset($postid) || $postid== NULL){
    header("Location:404_error.php");
}else{
    $id= $postid;
}
?>
        <div class="contentsection contemplete  clear">
            <div class="maincontent clear">
                <div class="about">
                    <?php 
                    $query= "SELECT * FROM tbl_post WHERE id= $id AND status= '2' ";
                    $post= $db->select($query);
                    if($post){
                        while ($result= $post->fetch_assoc()){
                            
                       
                  
                    ?>
                    <h2><?php echo $result['title']; ?></h2>
                     <h4><?php echo $fm->formatDate($result['date']); ?>,  By <a href=""><?php echo $result['author']; ?></a></h4>
                     <img src="admin_pannel/<?php echo str_replace('../../../','', $result['image']) ?>" alt="post Image">
                    <p>My post...Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.
                       Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.
                       Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.Some text will go here.</p>
                    <div class="myicon">
                        <i class="fa fa-bicycle" aria-hidden="true"></i>
                    </div>
                    <?php echo $result['body']; ?>
                   
                    
                    <div class="relatedpost clear">
                        <h2>Related articles</h2>
                        <?php 
                        $catid= $result['cat'];
                        $queryrelated= "SELECT * FROM tbl_post WHERE status= '2' AND cat= '$catid' order by rand() limit 6";
                        $relatedpost= $db->select($queryrelated);
                        if($relatedpost){
                        while ($reresult= $relatedpost->fetch_assoc()){
                        ?>
                        <a href="post.php?id=<?php echo $reresult['id']; ?>"> <img src="admin_pannel/<?php  echo str_replace('../../../','', $reresult['image']) ;  ?>" alt="post Image"></a>
                        <?php
                        }
                        
                        }else{
                                  echo    "No Related post available";
                                } 
                        ?>
                        
                    </div>
                </div>
                <?php } } else{"<script>window.location= '404_error.php'; </script>";}?>
            </div>
<?php include './inc/sidebar.php'; ?>
        </div>
<?php include './inc/footer.php'; ?>
        