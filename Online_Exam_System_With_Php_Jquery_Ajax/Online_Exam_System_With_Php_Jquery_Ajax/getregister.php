<?php
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/ClassUser.php');
       $ClassUser= new ClassUser();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $userregistration= $ClassUser->UserRegistration($name, $username, $password, $email);
}

