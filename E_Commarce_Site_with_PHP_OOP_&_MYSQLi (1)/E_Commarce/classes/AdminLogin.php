<?php
//error_reporting(E_ALL);

include dirname(__DIR__) . '/lib/ec_Session.php';
ec_Session::checkLogin();
include_once dirname(__DIR__) . '/lib/ec_Database.php';
include_once dirname(__DIR__) .  '/helpers/ec_Format.php';
?>
<?php
class AdminLogin{
    private $db;
    private $frmt;
    
    public function __construct() {
        $this->db= new ec_Database;
        $this->frmt= new ec_Format();
    }
    public function AdminLogin($username, $password){
        $username= $this->frmt->validation($username);
        $password= $this->frmt->validation($password);
        $username= mysqli_real_escape_string($this->db->link, $username);
        $password= mysqli_real_escape_string($this->db->link, md5($password));
        
       if(empty($username) || empty($password)){
           $loginmsg= "Username or password must not be empty";
           return $loginmsg;
    }else{
        $query= "SELECT * FROM tbl_login WHERE username='$username' AND password='$password'";
        $result= $this->db->select($query);
        if($result != false) {
            $value= $result->fetch_assoc();
            ec_Session::set("login",true);
            ec_Session::set("id", $value['id']);
            ec_Session::set("username", $value['username']);
            ec_Session::set("name", $value['name']);
            header('Location:index.php');
        } else{
            $loginmsg= "Username or Password not match";
            return $loginmsg;
        }
    }
    }
    
}

