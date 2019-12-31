<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<head>
   <script src="js/vendor/modernizr-2.8.3.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
<?php
if(!isset($_GET['viewpostid']) || $_GET['viewpostid']==NULL){
    header("Location:article_list.php");
} else{
    $articleid= $_GET['viewpostid'];
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2>Update Article</h2>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){ 
      
                        }
                            ?>
                            
                            <?php
                            $query="SELECT * FROM tbl_post WHERE id='$articleid' ";
                            $getarticle= $db->select($query);
                            if($getarticle){
                                while($articleresult= $getarticle->fetch_assoc()){
                                    
                                
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Title:</td>
                                        <td><input type="text" readonly value="<?php echo $articleresult['title'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Descreption:</td>
                                        <td>
                                            <textarea readonly name="editor1" >
                                            <?php echo $articleresult['body'] ?>
                                            </textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Category:</td>
                                        <td>
                                            <select>
                                                <?php
                                                $query= "SELECT * FROM tbl_category";
                                                $category= $db->select($query);
                                                if($category){
                                                    while($result= $category->fetch_assoc()) {
                                                ?>
                                                <option
                                                   <?php  if($articleresult['cat']==$result['id']) {?>
                                                    selected="selected"
                                                   <?php } ?> value="<?php echo $result['id'] ?>"><?php echo $result['name'] ;?></option>
                                                <?php } } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Author</td>
                                        <td><input type="text" readonly value="<?php echo $articleresult['author'] ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>tags</td>
                                        <td><input type="text" readonly value="<?php echo $articleresult['tags'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Image</td>
                                        <td>
                                            <img src="<?php echo $articleresult['image'];?>" height="100px" width="250px"/><br/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Ok"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php }
                            } ?>
                            </div>
                      </div>   
                    </article>
                </section>
                  <?php include '../dist/inc/footerpart.php'; ?>
                </div>
         
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>



