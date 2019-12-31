<?php
        if(isset($_GET['page_id'])){
            $pagetitleid= $_GET['page_id'];           
                            $query= "SELECT * FROM tbl_page WHERE '$pagetitleid' ";
                            $pages=$db->select($query);
                            if($pages){
                                while($result= $pages->fetch_assoc()){ ?>
                                  <title><?php echo $result['name']; ?>-<?php echo TITLE; ?></title>
                                  
                          <?php } } } elseif(isset($_GET['id'])){
            $postid= $_GET['id'];           
                            $query= "SELECT * FROM tbl_post WHERE id='$postid' ";
                            $posts=$db->select($query);
                            if($posts){
                                while($result= $posts->fetch_assoc()){ ?>
                                  <title><?php echo $result['title']; ?>-<?php echo TITLE; ?></title>
                          <?php } } }else{ ?>
                                  <title><?php echo $fm->title(); ?>-<?php echo TITLE; ?></title>
                          <?php } ?>
        <title><?php echo TITLE; ?></title>
        <meta name="language" content="English">
        <meta name="description" content="It's a website about #subject"/>
        <?php
        // this block is for setting dynamic metatags
        if(isset($_GET['id'])){
            $tagid=$_GET['id'];
            $query= "SELECT * FROM tbl_post WHERE id='$tagid' ";
                          $tags=$db->select($query);
                          if($tags){
                              while($result=$tags->fetch_assoc()){ ?>
                            <meta name="Tags" content="<?php echo $result['tags'] ?>"/>
             <?php }}} else{?>
                             <meta name="Tags" content="<?php echo Tags; ?>"/>
                             
                 <?php } // this block is for setting dynamic metatags ends here?>
                            
        
        <meta name="author" content="author name"/>
