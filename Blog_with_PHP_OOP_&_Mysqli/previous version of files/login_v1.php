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
        <title>User Login</title>
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
                $username= $frmt->validation($_POST['username']);// here the input of username is being checked, cleared and validet from the "validation()" function from "BlogFormat.php/ line: 13"
                $password= $frmt->validation(md5($_POST['password']));// here the input of password is also being  check cleared and validet from "validation()" function from "BlofFromat.php/line:13"."md5()" is a function that encrypt the data into 32 characters encryption
                $username= mysqli_real_escape_string($db->link, $username);// "mysqli_real_escape_string()" is a function that check the input data to protect from maleshius code
                $password= mysqli_real_escape_string($db->link, $password);// "mysqli_real_escape_string()" is a function that check the input data to protect from maleshius code
                
                $query= "SELECT * FROM tbl_user WHERE username='$username' and password='$password'";// here we are doing a query that is the given username and passowrd is in the database or not
                $result= $db->select($query);//here the query is being run and the data is being selected from database by the "select()" function from "BlogDatabase.php"
                if($result != false){// here the compiler is checking that if there is any result or not.
                    $value= mysqli_fetch_array($result);// here the selected data of "$result" variable is being fetched from database and being stored in the "$value". Deactivated from tutorial-47
                    //$value= $result->fetch_assoc();
                    $row= mysqli_num_rows($result);// here the fetched data is being counted that how many rows of data has been found from database. Deactivated from tutorial-47
                    if($row > 0){// if the data row ammount is more than 0. Deactivated from tutorial-47
                        BlogSession::set("login", true);// then here the compiler will go to "BlogSession.php/line:6-7"  and set "login" as a key and "true" as value
                        BlogSession::set("username", $value['username']);// then the compiler will set "username" as key and fetched data of username column of database as value
                        BlogSession::set("userrole", $value['role']);// // then the compiler will set "userrole" as key and fetched data of role column of database as value
                        BlogSession::set("userId", $value['id']); //then the compiler will set "userId" as key and fetched data of id column of database as value
                        header("Location:index.php");// then the compiler will redirect the user through "Admin_pannel/index.php" page
                     } else{ //Deactivated from tutorial-47
                        echo"<span style='color: red; font-size: 18px;'>No result found!!</span>";
                    }
                } else{
                     echo"<span style='color: red; font-size: 18px;'>Username or password not mached!!</span>";
                }
            }
            ?>
            <form action="login.php" method="post">
                  <h2>User Login</h2>
             <div>
            <label>Username</label>
            <input type='text' name='username' placeholder="Please Enter Your Username"/>
            </div>
            <label>Password</label>
            <input type="password" name="password" placeholder="Please Enter Your Password"/>
            <div>
                <input type="submit" name="submit" value="submit">
                <a href="forget_password.php"><input type="submit" name="submit" value="Forgot Password"></a>
            </div>
            </form>
        </section>
    </body>
</html>
