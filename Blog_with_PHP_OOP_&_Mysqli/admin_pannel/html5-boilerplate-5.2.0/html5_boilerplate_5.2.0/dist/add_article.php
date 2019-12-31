<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<head>
   <script src="js/vendor/modernizr-2.8.3.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2>Add Article</h2>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                                
                                 $cat= mysqli_real_escape_string($db->link, $_POST['category']);
                                 $title= mysqli_real_escape_string($db->link, $_POST['title']);
                                 $body= mysqli_real_escape_string($db->link, $_POST['editor1']);
                                 $author= mysqli_real_escape_string($db->link, $_POST['author']);
                                 $userrank= mysqli_real_escape_string($db->link, $_POST['userrank']);
                                 $tags= mysqli_real_escape_string($db->link, $_POST['tags']);
                                 
                            $parmited = array('jpg','jpeg', 'png', 'gif');
                            $file_name= $_FILES['image']['name']; //this is storing the uploading image file's name
                            $file_size= $_FILES['image']['size']; //this is storing the uploading image file's size
                             $file_temp= $_FILES['image']['tmp_name']; //this is storing the uploading image file's temporary name in server
                             $div= explode('.',$file_name); //for details on "explode()" function visit" fundamental_part_21-46" line 655
                              $file_extention= strtolower(end($div));// this "end()" function is to catch the last part of a filename based on any delimeter(.,) that is the extention of a file. For details of "strtolower()" function visit fundamental_part_21-46" line 674
                             $unique_image= substr(md5(time()),0,10).'.'.$file_extention; // every second is unique. When we upload morethan one image by having same name, then the compilar saves them by using time as an unique id. "substr()" generate an encription code to encript that unique id.Another function named "uniqueid" can also generate an unique for any data in database
                            $uploaded_image= "../../../Uploads/images/".$unique_image; //this is the folder path where the image will be stored along with storing in database
                            
                            
                              if($title==""|| $body==""|| $cat==""|| $author==""|| $tags==""|| $file_name==""){
                                  echo"<span class='error'>Field must not be empty!!</span>";
                              }elseif ($file_size > 1048576) {
                                     echo "<span class='error'>Image size should be less than 1 megabyte</span>";
                                }elseif (in_array($file_extention, $parmited)===FALSE) {
                                     echo "<span class='error'>You can upload only:-".implode(',', $parmited)."</span>";
                                  }else{
                                       move_uploaded_file($file_temp, $uploaded_image); // "move_uploaded_file" is a function that move a file to a signaficante folder or directory
                                       $query= "INSERT INTO tbl_post(cat, title, body, image, author, tags, userrank) VALUES('$cat', '$title', '$body', '$uploaded_image', '$author', '$tags', '$userrank')";
                                       
                                   
                                       
                                       $inserted_rows= $db->insert($query);
                                       
                                       if($inserted_rows){
                                                echo "<span class='success'>Post inserted successfully</span>";
                             }else{
                                echo  "<span class='error'>Post Not Inserted</span>";
                             }
                            }
                           }
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Title:</td>
                                        <td><input type="text" name="title" placeholder="Plaese Enter a title"/></td>
                                    </tr>
                                    <tr>
                                        <td>Descreption:</td>
                                        <td>
                                        <textarea name="editor1" ></textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Category:</td>
                                        <td>
                                            <select name="category">
                                                <?php
                                                $query= "SELECT * FROM tbl_category";
                                                $category= $db->select($query);
                                                if($category){
                                                    while($result= $category->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                                <?php } } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Author</td>
                                        <td><input type="text"name="author" value="<?php echo BlogSession::get('username') ?>">
                                            <input type="hidden" name="userrank" value="<?php echo BlogSession::get('userId') ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>tags</td>
                                        <td><input type="text" name="tags" placeholder="Enter tags separeted by comma"></td>
                                    </tr>
                                    <tr>
                                        <td>Upload Image</td>
                                        <td><input type="file" name="image"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Submit"></td>
                                    </tr>
                                </table>
                            </form>
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