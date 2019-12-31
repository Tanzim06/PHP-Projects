<?php

include dirname(dirname(dirname((__DIR__)))) . '/lib/ec_Session.php';
ec_Session::checkLogin();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Admin Panel || Category Option</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
       <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]--><!-- Add your site or application content here -->

        <div class="templete">
         <header class="headeroption clear">
                <h2>Admin Area</h2>
                <?php
                if(isset($_GET['action']) && $_GET['action']=="logout"){
                    ec_Session::destroy();
                    header("Location:login.php");
                }
                ?>
            <nav class="mainmenu clear">
               <ul>
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="user.php">User</a></li>
                    <li><a href="inbox.php">Inbox</a></li>
                    <li><a href="change_password.php">Change Password</a></li>
                    <li><a href="?action=logout">Log out</a></li>
                </ul>
           </nav>
         </header>