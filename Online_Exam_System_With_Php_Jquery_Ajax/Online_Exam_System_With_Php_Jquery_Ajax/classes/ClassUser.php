<?php
$filepath = realpath(dirname(__FILE__));
        include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Exam_Database.php');
	include_once ($filepath.'/../helpers/Exam_Format.php');

Class ClassUser {
    private $Exam_db;
    private $fm;
    public function __construct() {
        $this->Exam_db= new Exam_Database();
        $this->fm= new Exam_Format();
    }
    public function UserRegistration($name, $username, $password, $email){
        $name= $this->fm->validation($name);
        $username= $this->fm->validation($username);
        $password= $this->fm->validation($password);
        $email= $this->fm->validation($email);
        $name= mysqli_real_escape_string($this->Exam_db->link, $name);
        $username= mysqli_real_escape_string($this->Exam_db->link, $username);
        $email= mysqli_real_escape_string($this->Exam_db->link, $email);
        if($name == ""||$username == ""||$password == ""||$email == ""){
            echo"<span class='error'>Field must not be empty!</span>";
            exit();
        }elseif(filter_var($email, FILTER_VALIDATE_EMAIL)=== false){
            echo"<span class='error'>Invalid Email address!</span>";
            exit();
        }else{
            $checkmail="SELECT * FROM tbl_user WHERE email='$email'";
            $checkresult=$this->Exam_db->select($checkmail);
            if($checkresult !=false){
                echo"<span class='error'>Email address already exist!</span>";
            exit();
            }else{
                $password= mysqli_real_escape_string($this->Exam_db->link, md5($password));// the password have to be validate here because without this the function will generate an encryption of empty string by md5.
                $query="INSERT INTO tbl_user(name, username, password, email)VALUES('$name', '$username','$password','$email')";
                $inserted_row=$this->Exam_db->insert($query);
                if($inserted_row){
                    echo"<span class='success'>Registration Successfull</span>";
            exit();
                }else{
                  echo"<span class='error'>Registration not completed!</span>";
            exit();  
                }
            }
        }
        
    }
    
    public function UserLogin($email, $password){
        $email= $this->fm->validation($email);
        $password= $this->fm->validation($password);
        $email= mysqli_real_escape_string($this->Exam_db->link, $email);
        if($email == ""||$password == ""){
        echo"empty";
            exit();
    }else{
        $password= mysqli_real_escape_string($this->Exam_db->link, md5($password));
        $query="SELECT * FROM tbl_user WHERE email='$email'AND password='$password'";
        $result= $this->Exam_db->select($query);
        if($result !=false){
            $value= $result->fetch_assoc();
            if($value['status']== '1'){
                echo"disable";
                exit();
            }else{
            Session::init();
            Session::set("login", true);
            Session::set("userid", $value['userid']);
            Session::set("username", $value['username']);
            Session::set("name", $value['name']);
            }
        }else{
            echo"error";
            exit();
        }
    } 
    }
    public function GetUserDataById($userid){
        $query="SELECT * FROM tbl_user WHERE userid='$userid'";
        $result= $this->Exam_db->select($query);
        return $result;
    }
    public function GetAllUser(){
        $query="SELECT * FROM tbl_user ORDER BY userid DESC";
        $result= $this->Exam_db->select($query);
        return $result;
    }
    public function UpdateUserData($userid, $data){
        $name= $this->fm->validation($data['name']);
        $username= $this->fm->validation($data['username']);
        $email= $this->fm->validation($data['email']);
        $name= mysqli_real_escape_string($this->Exam_db->link, $name);
        $username= mysqli_real_escape_string($this->Exam_db->link, $username);
        $email= mysqli_real_escape_string($this->Exam_db->link, $email);
        
        $query="UPDATE tbl_user SET name='$name',username='$username', email='$email' WHERE userid='$userid'";
        $updated_row=$this->Exam_db->update($query);
        if($updated_row){
            $msg="<span class='success'>User Data Updated</span>";
            return $msg;
        }else{
            $msg="<span class='error'>User Data Not Updated!</span>";
            return $msg;
        }
    }
    public function DisableUser($disableid){
        $query="UPDATE tbl_user SET status='1' WHERE userid='$disableid'";
        $updated_row=$this->Exam_db->update($query);
        if($updated_row){
            $msg="<span class='success'>User Disabled</span>";
            return $msg;
        }else{
            $msg="<span class='error'>User Not Disabled!</span>";
            return $msg;
        }
    }
    public function EnableUser($enableid){
        $query="UPDATE tbl_user SET status='0' WHERE userid='$enableid'";
        $updated_row=$this->Exam_db->update($query);
        if($updated_row){
            $msg="<span class='success'>User Enabled</span>";
            return $msg;
        }else{
            $msg="<span class='error'>User Not Enabled!</span>";
            return $msg;
        }
    }
    public function DeleteUser($delid){
        $query="DELETE FROM tbl_user WHERE userid='$delid'";
        $deleted_row=$this->Exam_db->delete($query);
        if($deleted_row){
            $msg="<span class='success'>User Deleted</span>";
            return $msg;
        }else{
            $msg="<span class='error'>User Not Deleted!</span>";
            return $msg;
        }
    }
}

