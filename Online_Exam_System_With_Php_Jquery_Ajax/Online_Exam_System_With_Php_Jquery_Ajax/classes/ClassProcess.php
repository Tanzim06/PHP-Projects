<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
        //Session::init();
include_once ($filepath.'/../lib/Exam_Database.php');
include_once ($filepath.'/../helpers/Exam_Format.php');
class ClassProcess {
    private $Exam_db;
    private $fm;
    public function __construct(){
        $this->Exam_db= new Exam_Database();
        $this->fm= new Exam_Format();
    }
    public function ProcessData($data){
        $selectedans= $this->fm->validation($data['ans']);
        $number= $this->fm->validation($data['number']);
        $selectedans= mysqli_real_escape_string($this->Exam_db->link, $selectedans);
        $number= mysqli_real_escape_string($this->Exam_db->link, $number);
        $next= $number+1;
        if(!isset($_SESSION['score'])){
            $_SESSION['score'] = '0';
        }
        $total=$this->GetTotal();
        $rightans= $this->RightAns($number);
        if($rightans==$selectedans){
            $_SESSION['score']+=5;
        }
        if($number==$total){
            header("Location:final.php");
        }else{
            header("Location:test.php?question=".$next);
        }
    }
    private function GetTotal(){
    $query="SELECT * FROM tbl_question";
    $getresult= $this->Exam_db->select($query);
    $total= $getresult->num_rows;//"num_rows" is a function that is used to count the number of rows ofa signaficant table
    return $total;
    }
    private function RightAns($number){
    $query="SELECT * FROM tbl_answer WHERE questionNo='$number'AND rightAnswer='1'";
    $getdata= $this->Exam_db->select($query)->fetch_assoc();
    $result=$getdata['id'];
    return $result;
    }
}
