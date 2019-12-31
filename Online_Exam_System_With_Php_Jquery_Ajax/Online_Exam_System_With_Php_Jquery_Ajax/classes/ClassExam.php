<?php
$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Exam_Database.php');
	include_once ($filepath.'/../helpers/Exam_Format.php');

Class ClassExam {
    private $exam_db;
    private $fm;
    public function __construct(){
        $this->exam_db= new Exam_Database();
        $this->fm= new Exam_Format();
    }
    
    public function AddQuestions($data){
        $questionNo= $this->fm->validation($data['questionNo']);
        $question= $this->fm->validation($data['question']);
        $ans= array();
        $ans[1]= $this->fm->validation($data['ans1']);
        $ans[2]= $this->fm->validation($data['ans2']);
        $ans[3]= $this->fm->validation($data['ans3']);
        $ans[4]= $this->fm->validation($data['ans4']);
        $rightAnswer= $this->fm->validation($data['rightAnswer']);
        $questionNo= mysqli_real_escape_string($this->exam_db->link, $questionNo);
        $question= mysqli_real_escape_string($this->exam_db->link, $question);
        $ans1= mysqli_real_escape_string($this->exam_db->link, $ans[1]);
        $ans2= mysqli_real_escape_string($this->exam_db->link, $ans[2]);
        $ans3= mysqli_real_escape_string($this->exam_db->link, $ans[3]);
        $ans4= mysqli_real_escape_string($this->exam_db->link, $ans[4]);
        $rightAnswer= mysqli_real_escape_string($this->exam_db->link, $rightAnswer);
        
        $query="INSERT INTO tbl_question(questionNo, question)VALUES('$questionNo','$question')";
        $inserted_row=$this->exam_db->insert($query);
        if($inserted_row){
            foreach($ans as $key => $ansname){
                if($ansname !=''){
                    if($rightAnswer == $key){
                        $rquery="INSERT INTO tbl_answer(questionNo, rightAnswer, answer)VALUES('$questionNo','1','$ansname')";
                    }else{
                        $rquery="INSERT INTO tbl_answer(questionNo, rightAnswer, answer)VALUES('$questionNo','0','$ansname')";
                    }
                    $inserted_row=$this->exam_db->insert($rquery);
                    if($inserted_row){
                        continue;
                    }else{
                        die("Error....");
                    }
                }
            }
            $msg="<span class='success'>Question Added Successfully....</span>";
            return $msg;
        }
    }
    
public function GetQuestionByOrder(){
    $query= "SELECT * FROM tbl_question ORDER BY questionNo ASC";
    $result= $this->exam_db->select($query);
    return $result;
}
public function DelQuestion($questionNo){
    $tables= array("tbl_question","tbl_answer");
    foreach($tables as $table){
        $delquery="DELETE FROM $table WHERE questionNo='$questionNo'";
        $deldata= $this->exam_db->delete($delquery);
    }if($deldata){
        $msg="<span class='success'>Data Deleted Successfully</span>";
        return $msg;
    }else{
        $msg="<span class='error'>Data Not Deleted!</span>";
        return $msg;
    }
}
public function GetTotalQuestions(){
    $query="SELECT * FROM tbl_question";
    $getresult= $this->exam_db->select($query);
    $total= $getresult->num_rows;//"num_rows" is a function that is used to count the number of rows ofa signaficant table
    return $total;
    
}
    public function GetQuestion(){
    $query="SELECT * FROM tbl_question";
    $getdata= $this->exam_db->select($query);
    $result= $getdata->fetch_assoc();
    return $result;
    }
    public function GetQuestionByNumber($NOquestion){
    $query="SELECT * FROM tbl_question WHERE questionNo='$NOquestion'";
    $getdata= $this->exam_db->select($query);
    if($getdata !=false){
    $result= $getdata->fetch_assoc();
    return $result;
    }else{
        header("Location:error.php");
    }
   
    }
    public function GetAnswer($NOquestion){
        $query="SELECT * FROM tbl_answer WHERE questionNo='$NOquestion'";
    $getdata= $this->exam_db->select($query);
    return $getdata;
    }
}


