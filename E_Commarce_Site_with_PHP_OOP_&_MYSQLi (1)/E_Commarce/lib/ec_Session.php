<?php
class ec_Session{
    public static function init(){
        session_start(); //this "session_start()" function is used for starting the the login session.
    }
    public static function set($key, $val){
        $_SESSION[$key]= $val;// here the key and value will come from "login.php/line: 46,47,48" and will be seted for login
    }
    public static function get($key){
        if(isset($_SESSION[$key])){// here the key and value will be checked that if the key and value is seted or not
            return $_SESSION[$key];// here the key is returning to the "login.php" page
        }else{
            return false;
        }
    }
    public static function checkSession(){
        self::init();//here the session is starting for login.
        if(self::get("login")== false){// here the compiler is checking that if the value of "login" is false
            self::destroy();
            header("Location:login.php");
        }
    }
    public static function checkLogin(){
        self::init();//here the session is starting for login.
        if(self::get("login") == false && basename($_SERVER['REQUEST_URI']) != 'login.php' ){// here the compiler is checking that if the value of "login" is false
           header("Location:login.php");
        }
    }
    public static function destroy(){// this function will destroy the session
        session_destroy();
        header("Location:login.php");
    }
}
