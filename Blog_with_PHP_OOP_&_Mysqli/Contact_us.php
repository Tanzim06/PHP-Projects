<?php include './inc/header.php' ?>
            <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){// here the compiler is checking that if there is any click on "Submit" button or not.
                $firstname= $fm->validation($_POST['firstname']);// here the input of username is being checked, cleared and validet from the "validation()" function from "BlogFormat.php/ line: 13"
                $lastname= $fm->validation($_POST['lastname']);
                $email= $fm->validation($_POST['email']);
                $body= $fm->validation($_POST['body']);
                 
                
                $firstname= mysqli_real_escape_string($db->link, $firstname);// "mysqli_real_escape_string()" is a function that check the input data to protect from maleshius code
                $lastname= mysqli_real_escape_string($db->link, $lastname);
                $email= mysqli_real_escape_string($db->link, $email);
                $body= mysqli_real_escape_string($db->link, $body);
                
                $error="";
                if(empty($firstname)){
                    $error="Firstname must not be empty";
                }elseif (empty($lastname)) {
                    $error="Lastname must not be empty";
                }elseif (empty($email)) {
                    $error="Email must not be empty";
                }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error="Invalid email address";
                }elseif (empty($body)) {
                    $error="Message must not be empty";
                }else{
                     $query= "INSERT INTO  tbl_contact (firstname, lastname, email, body) VALUES('$firstname', '$lastname', '$email', '$body')";
                               
                                       $inserted_rows= $db->insert($query);
                                       
                                       if($inserted_rows){
                                               $msg_sent= "Message sent successfully";
                             }else{
                                              $error ="Message not sent";
                                     }
                                  }
                               }
            ?>
        <div class="contentsection contemplete clear">
            <div class="maincontent clear">
                <div class="about">
                    <h2>Contact Us</h2>
                    <?php
                    if(isset($error)){
                        echo "<span style='color:red'>$error</span>";
                    }
                    if(isset($msg_sent)){
                        echo "<span style='color:green'>$msg_sent</span>";
                    }
                    ?>
                    <form action="" method="post">
                    <table>
                        <tr>
                            <td>Your first name:</td>
                            <td><input type="text" name="firstname" placeholder="Enter Firstname"></td>
                        </tr>
                        <tr>
                            <td>Your last name:</td>
                            <td><input type="text" name="lastname" placeholder="Enter Lastname"></td>
                        </tr>
                        <tr>
                            <td>Your Email Address:</td>
                            <td><input type="text" name="email" placeholder="Enter Email Address"></td>
                        </tr>
                        <tr>
                            <td>Your Message:</td>
                            <td>
                                <textarea name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Send"></td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div class="googlemap">
                    <div id="map"></div>
                </div>
            </div>
<?php include './inc/sidebar.php'; ?>
        </div>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt1L5il9nsgjVCtYK1gaza8tBB9Qf7MYk" type="text/javascript"></script>
  
  <script src="js/gmaps.js"></script>
        <script type="text/javascript">
    var map;
    $(document).ready(function(){
      var map = new GMaps({
        el: '#map',
        lat: 23.7407399,
        lng:90.3679521,
        scrollwheel:false
      });

      GMaps.geolocate({
        success: function(position){
          map.setCenter(position.coords.latitude, position.coords.longitude);
        },
        error: function(error){
          alert('Geolocation failed: '+error.message);
        },
        not_supported: function(){
         // alert("Your browser does not support geolocation");
        },
        always: function(){
         // alert("Done!");
        }
      });
    });
  </script>
 <?php include './inc/footer.php'; ?>