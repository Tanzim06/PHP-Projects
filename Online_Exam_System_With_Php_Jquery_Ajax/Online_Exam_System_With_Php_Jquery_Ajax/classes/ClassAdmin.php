<?php
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Exam_Database.php');
	include_once ($filepath.'/../helpers/Exam_Format.php');

Class ClassAdmin {
    private $exam_db;
    private $fm;
    public function __construct() {
        $this->exam_db= new Exam_Database();
        $this->fm= new Exam_Format();
    }
    public function GetAdminData($data){
        $adminUser= $this->fm->validation($data['adminUser']);
        $adminPassword= $this->fm->validation($data['adminPassword']);
        $adminUser= mysqli_real_escape_string($this->exam_db->link, $adminUser);
        $adminPassword= mysqli_real_escape_string($this->exam_db->link, md5($adminPassword));
        
        $query= "SELECT * FROM tbl_admin WHERE adminUser='$adminUser' AND adminPassword='$adminPassword'";
        $result= $this->exam_db->select($query);
        if($result != false){
            $value= $result->fetch_assoc();
            Session::init();
            Session::set("adminLogin", true);
            Session::set("adminUser", $value['adminUser']);
            Session::set("adminId", $value['adminId']);
            header("Location:index.php");
        }else{
            $msg="<span class='error'>Username or password not mached</span>";
            return $msg;
        }
    }
}

