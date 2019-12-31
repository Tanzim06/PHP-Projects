<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<head>
   <script src="js/vendor/modernizr-2.8.3.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
<?php
if(!isset($_GET['sliderid']) || $_GET['sliderid']==NULL){
    header("Location:article_list.php");
} else{
    $sliderid= $_GET['sliderid'];
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2>Update Article</h2>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                                
                                 $title= mysqli_real_escape_string($db->link, $_POST['title']);
                                 
                            $parmited = array('jpg','jpeg', 'png', 'gif');
                            $file_name= $_FILES['image']['name']; //this is storing the uploading image file's name
                            $file_size= $_FILES['image']['size']; //this is storing the uploading image file's size
                             $file_temp= $_FILES['image']['tmp_name']; //this is storing the uploading image file's temporary name in server
                             $div= explode('.',$file_name); //for details on "explode()" function visit" fundamental_part_21-46" line 655
                             $file_extention= strtolower(end($div));// this "end()" function is to catch the last part of a filename based on any delimeter(.,) that is the extention of a file. For details of "strtolower()" function visit fundamental_part_21-46" line 674
                             $unique_image= substr(md5(time()),0,10).'.'.$file_extention; // every second is unique. When we upload morethan one image by having same name, then the compilar saves them by using time as an unique id. "substr()" generate an encription code to encript that unique id.Another function named "uniqueid" can also generate an unique for any data in database
                            $uploaded_image= "../../../Uploads/images/slider/".$unique_image; //this is the folder path where the image will be stored along with storing in database
                            
                            
                              if($title==""){
                                  echo"<span class='error'>Field must not be empty!!</span>";
                              }else{
                              
                              if(!empty($file_name)){
                              
                              if ($file_size > 1048576) {
                                     echo "<span class='error'>Image size should be less than 1 megabyte</span>";
                                }elseif (in_array($file_extention, $parmited)===FALSE) {
                                     echo "<span class='error'>You can upload only:-".implode(',', $parmited)."</span>";
                                  }else{
                                      
                                       
                                        move_uploaded_file($file_temp, $uploaded_image); // "move_uploaded_file" is a function that move a file to a signaficante folder or directory
                                        
                                        $query= "UPDATE tbl_slider SET  title='$title', image='$uploaded_image' WHERE id='$sliderid' ";
                                       
                                       $updated_rows= $db->update($query);
                                       
                                       if($updated_rows){
                                                echo "<span class='success'>Slider updated successfully</span>";
                             }else{
                                 "<span class='error'>Slider Not updated</span>";
                             }
                            }
                          }else{
                               $query= "UPDATE tbl_slider SET title='$title' WHERE id='$sliderid' ";
                                       
                                       $updated_rows= $db->update($query);
                                       
                                       if($updated_rows){
                                                echo "<span class='success'>Slider updated successfully</span>";
                             }else{
                                 "<span class='error'>Slider Not updated</span>";
                            }
                          }
                         }      
                        }
                            ?>
                            
                            <?php
                            $query="SELECT * FROM tbl_slider WHERE id='$sliderid' ";
                            $getslider= $db->select($query);
                            if($getslider){
                                while($sliderresult= $getslider->fetch_assoc()){
                                    
                                
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Title:</td>
                                        <td><input type="text" name="title" value="<?php echo $sliderresult['title'] ?>"/></td>
                                    </tr>
                                    
                                        <td>Upload Image</td>
                                        <td>
                                            <img src="<?php echo $sliderresult['image'];?>" height="100px" width="250px"/><br/>
                                            <input type="file" name="image">
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

