<?php
if (isset($_GET['question'])) {
    $NOquestion = (int) $_GET['question'];
} else {
    header('Location:exam.php');
}
?>
<?php include 'inc/header.php'; ?>
<?php
$total = $Front_Exam->GetTotalQuestions();
$question = $Front_Exam->GetQuestionByNumber($NOquestion);
?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $process= $ClassProcess->ProcessData($_POST);
}
?>
<div class="main">
    <h1>Question&nbsp;<?php echo $question['questionNo']; ?>&nbsp;of&nbsp;<?php echo $total ?></h1>
    <div class="test">
        <form method="post" action="">
            <table> 
                <tr>
                    <td colspan="2">
                        <h3>Que<?php echo $question['questionNo']; ?>:&nbsp;<?php echo $question['question']; ?></h3>
                    </td>
                </tr>
                <?php
                $answer= $Front_Exam->GetAnswer($NOquestion);
                if($answer){
                    while($result= $answer->fetch_assoc()){
                ?>
                <tr>
                    <td>
                        <input type="radio" name="ans" value="<?php echo $result['id'] ?>"/><?php echo $result['answer'] ?>
                    </td>
                </tr>
                <?php
                 }
                }
                ?>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Next Question"/>
                        <input type="hidden" name="number" value="<?php echo $NOquestion ?>"/>
                    </td>
                </tr>
            </table>
            </form>
    </div>
 </div>
<?php include 'inc/footer.php'; ?>