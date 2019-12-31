<?php include './inc/header.php'; ?>
<?php
Session::checkSession();
$total = $Front_Exam->GetTotalQuestions();
?>

<div class="main">
    <h1>All question's answer:&nbsp;<?php echo $total ?></h1>
    <div class="viewans">
        <table>
            <?php
            $getquestion= $Front_Exam->GetQuestionByOrder();
            if($getquestion){
                while($question= $getquestion->fetch_assoc()){
            ?>
            <tr>
                <td colspan="2">
                    <h3>Que<?php echo $question['questionNo']; ?>:&nbsp;<?php echo $question['question']; ?></h3>
                </td>
            </tr>
            <?php
            $NOquestion= $question['questionNo'];
            $answer = $Front_Exam->GetAnswer($NOquestion);
            if ($answer) {
                while ($result = $answer->fetch_assoc()) {
                    ?>
                    <tr>
                        <td>
                            <input type="radio"/><?php
                            if($result['rightAnswer']=='1'){
                                echo "<span style='color:green'>".$result['answer']."</span>";
                            }else{
                                echo $result['answer'];
                            }
                             
                                    ?>
                        </td>
                    </tr>
                    <?php
                  }
                 }
                }
            }
            ?>
        </table>
        <a href="starttest.php">Start again</a>
    </div>
</div>
<?php include 'inc/footer.php'; ?>

