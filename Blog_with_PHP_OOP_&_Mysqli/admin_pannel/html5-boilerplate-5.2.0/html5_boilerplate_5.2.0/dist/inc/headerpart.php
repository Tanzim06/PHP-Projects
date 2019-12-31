<?php include '../../../../lib/BlogSession.php';
 BlogSession::checkSession();
?>
<?php
include'../../../../config/config.php';
include'../../../../lib/BlogDatabase.php';
include'../../../../helpers/BlogFolmat.php';
?>
<?php
$db=new BlogDatabase();
$frmt= new BlogFormat();
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  // Date in the past
  //or, if you DO want a file to cache, use:
  header("Cache-Control: max-age=2592000"); 
//30days (60sec * 60min * 24hours * 30days)
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin Panel</title>
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

        <div class="templete">
         <header class="headeroption clear">
                <h2>Admin Area</h2>
                <?php 
                if(isset($_GET['action']) && $_GET['action']==logout){// here the compiler is checking that if there is any click on "logout" button
                    BlogSession::destroy();//if there is any click on "logout" button then compiler will call "destroy()" function to destroythe session
                }
                ?>
            <nav class="mainmenu clear">
               <ul>
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="add_user.php">User</a></li>
                    <li><a href="user_profile.php">User Profile</a></li>
                    <li><a href="inbox.php">Inbox
                        <?php
                        $query="SELECT * FROM tbl_contact WHERE status='0' ";
                        $msg =$db->select($query);
                        if($msg){
                            $count= mysqli_num_rows($msg);// hrere we are counting the ammont of incomming message
                            echo "(".$count.")";
                        }
                        ?>
                        </a></li>
                    <li><a href="?action=logout">Log out</a></li>
                </ul>
           </nav>
         </header>