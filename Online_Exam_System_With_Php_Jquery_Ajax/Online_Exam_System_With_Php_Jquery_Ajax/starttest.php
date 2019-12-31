<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$question= $Front_Exam->GetQuestion();
$total= $Front_Exam->GetTotalQuestions();
?>
<div class="main">
<h1>Welcome to Online Exam</h1>
            <div class="starttest">
                <h2>Test your web programming knowledge</h2>
                <p>This is a multiple choice quiz</p>
                <ul>
                    <li><strong>Number of question:</strong>&nbsp;<?php echo $total ?></li>
                    <li><strong>Total Marks:</strong>&nbsp;25</li>
                </ul>
                <a href="test.php?question=<?php echo $question['questionNo'] ?>">Start Test</a>
            </div>
</div>
<?php include 'inc/footer.php'; ?>

