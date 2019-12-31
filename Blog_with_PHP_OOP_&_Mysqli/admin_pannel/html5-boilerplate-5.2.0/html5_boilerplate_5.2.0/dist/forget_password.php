<?php include '../../../../lib/BlogSession.php'; // in any login system "session" class must have to be included at the top of the program
 BlogSession::checkLogin(); // by calling this "init()" function the session is being start here. It is being called from "BlogSession.php/line:3"
?>
<?php include '../../../../config/config.php'; ?>
<?php include '../../../../lib/BlogDatabase.php'; ?>
<?php include'../../../../helpers/BlogFolmat.php'; ?>
<?php
$db= new BlogDatabase();
$frmt= new BlogFormat();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Password Recovery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--><!-- Add your site or application content here -->

        <section class="loginpage clear" >
            <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){// here the compiler is checking that if there is any click on "Submit" button or not.
                $email= $frmt->validation($_POST['email']);// here the input of username is being checked, cleared and validet from the "validation()" function from "BlogFormat.php/ line: 13"
                
                $email= mysqli_real_escape_string($db->link, $email);// "mysqli_real_escape_string()" is a function that check the input data to protect from maleshius code
               if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<span style='color: red; font-size: 18px;'>Invalid Email Address!!!</span>";;
               }else{
                   $mailquery="SELECT * FROM tbl_user WHERE email= '$email' limit 1";
                   $mailcheck =$db->select($mailquery);
                if($mailcheck != false){// here the compiler is checking that if there is any result or not.
                     while($value= $mailcheck->fetch_assoc()){
                         $user_id= $value['id'];
                         $user_name= $value['username'];
                     }
                     $text= substr($email, 0, 3);
                     $rand= rand(10000, 99999);
                     $newpass= "$text$rand";
                     $password= md5($newpass);
                     $updatequery= "UPDATE tbl_user SET password= '$password' WHERE id= '$user_id' ";
                     $updated_row= $db->update($updatequery);
                     
                     $to= $email;
                     $from="tanzim06@ymail.com";
                     $headers= "From: $from\n";
                     $headers .= 'MIME-Version: 1.0' . "\r\n";
                     $headers .='Content-type: text/html; charset=iso-8859-1' . "\r\n";
                     $subject   ="Your password";
                     $message= "Your username is".$user_name." and password is ".$newpass." please visit website to login" ;
                     
                     $sendmail= mail($to, $subject, $message, $headers); 
                     if($sendmail){
                         echo"<span style='color: green; font-size: 18px;'>Email send!! check your mail for new password</span>";
                     }else{
                         echo"<span style='color: red; font-size: 18px;'>Email not send!!!</span>";
                     }
                     
                     } else{
                     echo"<span style='color: red; font-size: 18px;'>Email not Exist!!!!</span>";
                }
              }
            }
            ?>
            <form action="" method="post">
                  <h2>Password Recovery</h2>
             <div>
            <label>Email:</label>
            <input type='text' name='email' placeholder="Please Enter Your Email"/>
             </div>
            <div>
                <input type="submit" name="submit" value="Send mail">
                <a href="login.php">Login</a>
            </div>
            </form>
        </section>
    </body>
</html>

