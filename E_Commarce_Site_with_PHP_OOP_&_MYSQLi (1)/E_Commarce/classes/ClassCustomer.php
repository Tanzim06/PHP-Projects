<?php
include_once dirname(__DIR__) . '/lib/ec_Database.php';
include_once dirname(__DIR__) .  '/helpers/ec_Format.php';
Class ClassCustomer{
    private $db;
    private $fm;
    
    public function __construct() {
        $this->db= new ec_Database();
        $this->fm= new ec_Format();
    }
    public function CustomerRegistration($data){
        $name= mysqli_real_escape_string($this->db->link, $data['name']);
        $address= mysqli_real_escape_string($this->db->link, $data['address']);
        $city= mysqli_real_escape_string($this->db->link, $data['city']);
        $country= mysqli_real_escape_string($this->db->link, $data['country']);
        $zipcode= mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $phone= mysqli_real_escape_string($this->db->link, $data['phone']);
        $email= mysqli_real_escape_string($this->db->link, $data['email']);
        $password= mysqli_real_escape_string($this->db->link, md5($data['password']));
        
        $name= $this->fm->validation($name);
        $address= $this->fm->validation($address);
        $city= $this->fm->validation($city);
        $country= $this->fm->validation($country);
        $zipcode= $this->fm->validation($zipcode);
        $phone= $this->fm->validation($phone);
        $email= $this->fm->validation($email);
        $password= $this->fm->validation($password);
        
        if($name == "" || $address == "" || $city == "" || $country == "" ||  $zipcode== "" || $phone == "" || $email == "" || $password== "" ){
         $Usermsg= "<span class='error'>Field must not be empty</span>";
         return $Usermsg;
    }
    $mailquery="SELECT * FROM tbl_customer WHERE email='$email'LIMIT 1";
    $mailcheck= $this->db->select($mailquery);
    if($mailcheck !=false){
        $msg= "<span class='error'>Email already exists</span>";
        return $msg;
    }else{
         $query= "INSERT INTO tbl_customer(name, address, city, country, zipcode, phone, email, password) VALUES('$name','$address','$city','$country','$zipcode','$phone','$email','$password')";
         $ProductInsert= $this->db->insert($query);
        if($ProductInsert){
            $msg= "<span class='success'>Registration completed successfully</span>";
            return $msg;
        }else{
             $msg= "<span class='error'>Registration not completed</span>";
            return $msg;
      }
     }
    }
    public function CustomerLogin($data){
        $email= mysqli_real_escape_string($this->db->link, $data['email']);
        $password= mysqli_real_escape_string($this->db->link, md5($data['password']));
        $email= $this->fm->validation($email);
        $password= $this->fm->validation($password);
        if(empty($email)||empty($password)){
            $msg= "<span class='error'>Field must not be empty !</span>";
            return $msg;
        }
        $query= "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
        $result= $this->db->select($query);
        if($result !=false){
            $value= $result->fetch_assoc();
            ec_Session::set("custlogin", true);
            ec_Session::set("custid", $value['id']);
            ec_Session::set("custname", $value['name']);
            header("Location: cart.php");
            
        }else{
            $msg= "<span class='error'>Email or Password not mached!</span>";
            return $msg;
        }
    }
    public function GetCustomerData($id){
        $query= "SELECT * FROM tbl_customer WHERE id='$id'";
        $result= $this->db->select($query);
        return $result;
    }
    public function UpdateCustomerProfile($data, $custid){
        $name= mysqli_real_escape_string($this->db->link, $data['name']);
        $address= mysqli_real_escape_string($this->db->link, $data['address']);
        $city= mysqli_real_escape_string($this->db->link, $data['city']);
        $country= mysqli_real_escape_string($this->db->link, $data['country']);
        $zipcode= mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $phone= mysqli_real_escape_string($this->db->link, $data['phone']);
        $email= mysqli_real_escape_string($this->db->link, $data['email']);
        
        $name= $this->fm->validation($name);
        $address= $this->fm->validation($address);
        $city= $this->fm->validation($city);
        $country= $this->fm->validation($country);
        $zipcode= $this->fm->validation($zipcode);
        $phone= $this->fm->validation($phone);
        $email= $this->fm->validation($email);
        
        if($name == "" || $address == "" || $city == "" || $country == "" ||  $zipcode== "" || $phone == "" || $email == ""){
         $Usermsg= "<span class='error'>Field must not be empty</span>";
         return $Usermsg;
    }else{
         $query= "UPDATE tbl_customer SET name= '$name', address='$address', city='$city', country='$country', zipcode='$zipcode', phone='$phone', email='$email' WHERE id='$custid' ";
        $updated_row= $this->db->update($query);
        if($updated_row){
            $msg= "<span class='success'>Profile updated successfully</span>";
            return $msg;
        }else{
            $msg= "<span class='error'>Profile not updated</span>";
            return $msg;
      }
     }
    }
   }