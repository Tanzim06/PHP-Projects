<?php
//error_reporting(E_ALL);

include '../../classes/AdminLogin.php';

?>
<?php
$al= new AdminLogin();
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $username= $_POST['username'];
    $password= $_POST['password'];
    $CheckLogin= $al->AdminLogin($username, $password);
    
}
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
            <form action="" method="post">
                  <h2>User Login</h2>
                  <?php if(isset($CheckLogin)){
                  echo $CheckLogin;}?>
             <div>
            <label>Username</label>
            <input type='text' name='username' placeholder="Please Enter Your Username"/>
            </div>
            <label>Password</label>
            <input type="password" name="password" placeholder="Please Enter Your Password"/>
            <div>
                <input type="submit" name="submit" value="submit">
            </div>
            </form>
        </section>
    </body>
</html>
