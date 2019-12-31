  <div class="sidebar clear">
                <div class="samesidebar clear">
                    <h2>Category Of Articles</h2>
                    <ul>
                        <?php
                        $query= "SELECT * FROM tbl_category";
                         $category= $db->select($query);
                
                        if($category){
                         while($result= $category->fetch_assoc()){
                        ?>
                <li><a href="categorypost.php?category=<?php echo $result['id']; ?>"><?php echo $result['name'];?></a></li>
                        <?php }
                        
                         } else{?>
                <li>No Category created </li>
                      <?php   }  ?>
            </ul>
                </div>
                <div class="samesidebar clear">
                    <h2>Latest Articles</h2>
                    <?php
                     $query= "SELECT * FROM tbl_post WHERE status= '2'  limit 5";
                    $post= $db->select($query);
                    if($post){
                        while ($result= $post->fetch_assoc()){
                    ?>
                    <div class="popular clear">
                        <h3><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></h3>
                        <a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin_pannel/<?php echo str_replace('../../../','', $result['image']) ; ?>" alt="post Image"></a>
                    <?php echo $fm->TextShorting($result['body'], 120); ?>
                    </div>
                       <?php } } else{header("Location:404_error.php");}?>
                </div>
            </div>