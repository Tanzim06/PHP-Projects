<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
                           
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Header Option</h2>
                            <?php
                            $query= "SELECT * FROM title_slogan WHERE id='1' ";
                            $blog_title=$db->select($query);
                            if($blog_title){
                                while($result= $blog_title->fetch_assoc()){
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Update Title:</td>
                                        <td><input type="text" name="title" value="<?php echo $result['title'];?>"/></td>
                                    </tr>
                                     <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                                
                                $title= $frmt->validation($_POST['title']);
                                $slogan= $frmt->validation($_POST['slogan']);
                                 $title= mysqli_real_escape_string($db->link, $title);
                                 $slogan= mysqli_real_escape_string($db->link, $slogan);
                                 
                            $parmited = array( 'png');
                            $file_name= $_FILES['logo']['name']; //this is storing the uploading image file's name
                            $file_size= $_FILES['logo']['size']; //this is storing the uploading image file's size
                             $file_temp= $_FILES['logo']['tmp_name']; //this is storing the uploading image file's temporary name in server
                             $div= explode('.',$file_name); //for details on "explode()" function visit" fundamental_part_21-46" line 655
                             echo $file_extention= strtolower(end($div));// this "end()" function is to catch the last part of a filename based on any delimeter(.,) that is the extention of a file. For details of "strtolower()" function visit fundamental_part_21-46" line 674
                            echo $same_image= 'logo'.'.'.$file_extention; // every second is unique. When we upload morethan one image by having same name, then the compilar saves them by using time as an unique id. "substr()" generate an encription code to encript that unique id.Another function named "uniqueid" can also generate an unique for any data in database
                            $uploaded_image= "../../../Uploads/images/".$same_image; //this is the folder path where the image will be stored along with storing in database
                            
                            
                              if($title==""|| $slogan==""){
                                  echo"<span class='error'>Field must not be empty!!</span>";
                              }else{
                              
                              if(!empty($file_name)){
                              
                              if ($file_size > 1048576) {
                                     echo "<span class='error'>Image size should be less than 1 megabyte</span>";
                                }elseif (in_array($file_extention, $parmited)===FALSE) {
                                     echo "<span class='error'>You can upload only:-".implode(',', $parmited)."</span>";
                                  }else{
                                      
                                       
                                        move_uploaded_file($file_temp, $uploaded_image); // "move_uploaded_file" is a function that move a file to a signaficante folder or directory
                                        
                                        $query= "UPDATE  title_slogan SET  title='$title', slogan='$slogan', logo='$uploaded_image' WHERE id='1' ";
                                       
                                       $updated_rows= $db->update($query);
                                       
                                       if($updated_rows){
                                                echo "<span class='success'>Post updated successfully</span>";
                             }else{
                                 "<span class='error'>Post Not updated</span>";
                             }
                            }
                          }else{
                               $query= "UPDATE title_slogan SET title='$title', slogan='$slogan' WHERE id='1' ";
                                       
                                       $updated_rows= $db->update($query);
                                       
                                       if($updated_rows){
                                                echo "<span class='success'>Post updated successfully</span>";
                             }else{
                                 "<span class='error'>Post Not updated</span>";
                            }
                          }
                         }      
                        }
                            ?>
                                    <tr>
                                        <td>Update Description:</td>
                                        <td><input type="text" name="slogan" value="<?php echo $result['slogan'];?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Upload Logo: </td>
                                        <td><input type="file" name="logo"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="submit"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="logo">
                            <img src="<?php echo $result['logo'];?>" alt="logo">
                        </div>
                        <?php
                            }
                           }
                        ?>
                    </article>
                </section>
                <?php include '../dist/inc/footerpart.php'; ?>

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


