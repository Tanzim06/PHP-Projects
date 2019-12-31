<?php
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/ClassUser.php');
       $ClassUser= new ClassUser();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userlogin= $ClassUser->UserLogin($email, $password);
}
