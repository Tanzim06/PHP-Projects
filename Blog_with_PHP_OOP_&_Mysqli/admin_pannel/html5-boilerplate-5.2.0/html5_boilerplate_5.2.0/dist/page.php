<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<?php
if(!isset($_GET['page_id']) || $_GET['page_id']==NULL){
    header("Location:Index.php");
} else{
    $id= $_GET['page_id'];
}
?>
<head>
   <script src="js/vendor/modernizr-2.8.3.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2>Edit Page</h2>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                                
                                 $name= mysqli_real_escape_string($db->link, $_POST['name']);
                                 $body= mysqli_real_escape_string($db->link, $_POST['editor1']);

                                 
                              if($name==""|| $body==""){
                                  echo"<span class='error'>Field must not be empty!!</span>";
                              }else{
                                       $query= "UPDATE tbl_page SET name= '$name', body='$body' WHERE id= '$id' ";
                                     $update_rows= $db->update($query);
                                       
                                       if($update_rows){
                                                echo "<span class='success'>Page updated successfully</span>";
                             }else{
                                 "<span class='error'>Page not updated</span>";
                             }
                            }
                           }
                            ?>
                            <?php
                            $pagequery= "SELECT * FROM tbl_page WHERE id='$id' ";
                            $pagedetails=$db->select($pagequery);
                            if($pagedetails){
                                while($result= $pagedetails->fetch_assoc()){
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" name="name" value="<?php echo $result['name']  ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Descreption:</td>
                                        <td>
                                            <textarea name="editor1" >
                                            <?php echo $result['body']  ?>
                                            </textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    
                                    
                                    
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Update">
                                            <span class="delpage"><a onclick="return confirm('Are you sure to delete the page!')" href="delete_page.php?delete_page=<?php echo $result['id'] ?>">Delete</a></span>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <?php } } ?>
                            </div>
                      </div>   
                    </article>
                </section>
         
                    <?php require '../dist/inc/footerpart.php'; ?>

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

