<?php include dirname(__DIR__) . '/config/config.php'; ?>
<?php
                                                                /*----------{THIS FILE HAVE CAME FROM "CRUD WITH PHP & MYSQLI}----------*/
class ec_Database{
    public $host= DB_HOST;
    public $user= DB_USER;         //here we are putting the database identity informations into variables for dynamic use of database in this project
    public $pass= DB_PASS;
    public $dbname= DB_NAME;
    
    public $link;
    public $error;
    
    public function __construct() {
        $this->connectDB();
    }
    
    private function connectDB(){
        $this->link= new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->link){
            $this->error= "Connection failed".$this->link->connect_error; // this "connect_error" is a keyword which hold the error message in mysqli and show if the database connection is failed
            return FALSE; // If error then return 
        }
    }
    public function select($query){
        $result= $this->link->query($query) or die($this->link->error.__LINE__); //the query for data is being execute here. "query()" is a function that search data into the database table
        if($result->num_rows> 0){
            return $result;
        }else{
            return false;
        }
    }
    public function insert($query){
        $insert_row= $this->link->query($query) or die($this->link->error.__LINE__); // "__LINE__" is a builtin function that help to show the error along with line number(if happen)
        if($insert_row){
            return $insert_row; 
        }else{
            return false;
        }
    }
    public function update($query){
        $update_row= $this->link->query($query) or die($this->link->error.__LINE__); // "__LINE__" is a builtin function that help to show the error along with line number(if happen)
        if($update_row){
            return $update_row;
        }else{
            return false;
        }
    }
     public function delete($query){
        $delete_row= $this->link->query($query) or die($this->link->error.__LINE__); // "__LINE__" is a builtin function that help to show the error along with line number(if happen)
        if($delete_row){
            return $delete_row; 
        }else{
            return false;
        }
    }
}

