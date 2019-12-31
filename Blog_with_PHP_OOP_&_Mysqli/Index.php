<?php include './inc/header.php' ?>;
<?php include'./inc/slider.php'?>
<div class="contentsection contemplete clear">
            <div class="maincontent clear">
                    <!--Pagination-->
                   <?php
                   $par_page= 4;
                   if(isset($_GET["page"])){
                       $page=$_GET["page"];
                   }else{
                       $page=1;
                   }
                   $start_from=($page-1) * $par_page; //here the articles are being started to shown in a page based on this formula. (1-1)*4=0 so the id of first article will start from after 0
                   ?> 
                   <!--Pagination End-->
                <?php
                $query= "SELECT * FROM tbl_post Where status= '2' limit $start_from, $par_page";
                $post= $db->select($query); // hrere the $db is accessing the database and the "select()" is an user defined function from "BlogDatabase()" that is functioning with the query statement above this line
                
                if($post){
                    while($result= $post->fetch_assoc()){
               
                ?>
                <div class="samepost clear">
                    <h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title'];?></a></h2>
                    <h4><?php echo $fm->formatDate($result['date']); ?>,  By <a href=""><?php echo $result['author']; ?></a></h4>
                    <a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin_pannel/<?php echo str_replace('../../../','', $result['image']) ?>" alt="post Image"></a>
                    
                   <?php echo $fm->TextShorting($result['body']); ?>
                    
                 <div class="readmore clear">
                     <a href="post.php?id=<?php echo $result['id']; ?>">Read more...</a>
                 </div>
           </div>
                <?php } ?> <!--end of while-->
                
                <!--Pagination-->
                <?php 
                $query="SELECT * FROM tbl_post where status= '2' ";
                $result= $db->select($query);
                $total_rows= mysqli_num_rows($result); //here we are counting the total post rows of database table "tbl_post"
                $total_pages= ceil($total_rows / $par_page); //here the detarmenation is being that, how many pages of article lis will be in the blog. 4 articles in par page so, $tatal_rows/4
                
                
                echo "<span class='pagination'><a href='index.php?page=1'>".'First page'."</a> ";
                   for($i=1; $i<= $total_pages; $i++){
                       echo "<a href='index.php?page=".$i." '>".$i."</a>";
                   };
                  echo "<a href='index.php?page=$total_pages'>".'Last page'."</a></span> "?>
                <!--Pagination End-->
                <?php } else {"<script>window.location= '404_error.php'; </script>";} ?>
        </div>
     <?php include './inc/sidebar.php'; ?>
    </div>
<?php include './inc/footer.php'; ?>

<?php // echo str_replace('../../../','', $result['image']) ; ?> 