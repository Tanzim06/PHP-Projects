<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<?php
$userid= BlogSession::get('userId');
$userrole= BlogSession::get('userrole');
?>
   <script src="js/vendor/modernizr-2.8.3.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2>Update User Profile</h2>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                 $name= mysqli_real_escape_string($db->link, $_POST['name']);
                                 $username= mysqli_real_escape_string($db->link, $_POST['username']);
                                 $email= mysqli_real_escape_string($db->link, $_POST['email']);
                                 $details= mysqli_real_escape_string($db->link, $_POST['editor1']);
                                
                               $query= "UPDATE tbl_user SET name='$name', username='$username', email='$email', details='$details' WHERE id='$userid' ";
                                       
                                       $updated_rows= $db->update($query);
                                       
                                       if($updated_rows){
                                                echo "<span class='success'>User data updated successfully</span>";
                             }else{
                                 "<span class='error'>User data Not updated</span>";
                            }
                          }
                               
                        
                            ?>
                            
                            <?php
                            $query="SELECT * FROM tbl_user WHERE id='$userid' AND role='$userrole' ";
                            $getuser= $db->select($query);
                            if($getuser){
                                while($result= $getuser->fetch_assoc()){
                                    
                                
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" name="name" value="<?php echo $result['name'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Username:</td>
                                        <td><input type="text" name="username" value="<?php echo $result['username'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="text" name="email" value="<?php echo $result['email'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Details</td>
                                        <td>
                                            <textarea name="editor1" >
                                            <?php echo $result['details'] ?>
                                            </textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Update"></td>
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



