<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/inc/header.php');
include_once ($filepath . '/../classes/ClassExam.php');
$ClassExam= new ClassExam();
?>
<?php
// Session::checkLogin();
?>

<style>
    .adminpannel{width: 480px; color: #999; margin: 20px auto; padding: 10px; border: 1px solid #ddd;}
    input[type="number"] {
  border: 1px solid #ddd;
  margin-bottom: 10px;
  padding: 5px;
  width: 100px;
}
input[type="text"], input[type="password"] {
border: 1px solid #ddd;
    margin-bottom: 10px;
    padding: 5px;
    width: 330px;
}
input[type="submit"] {
  cursor: pointer;
  font-size: 15px;
  padding: 1px 10px;
}
</style>
<div class="main">
    <h1>Add Question</h1>
    <?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $addingquestion = $ClassExam->AddQuestions($_POST);
}
//GetTotal
$total= $ClassExam->GetTotalQuestions();
$next= $total+1;
?>
    <?php
    if(isset($addingquestion)){
        echo $addingquestion;
    }
    ?>
    <div class="adminpannel">
        <form action="" method="post">
            <table>
                <tr>
                    <td>Question No</td>
                    <td>:</td>
                    <td><input type="number" value="<?php if(isset($next)){echo $next;} ?>" name="questionNo"></td>
                </tr>
                <tr>
                    <td>Question</td>
                    <td>:</td>
                    <td><input type="text" name="question" placeholder="Enter question..." required></td>
                </tr>
                <tr>
                    <td>Choice one</td>
                    <td>:</td>
                    <td><input type="text" name="ans1" placeholder="Enter choice one..." required></td>
                </tr>
                <tr>
                    <td>Choice two</td>
                    <td>:</td>
                    <td><input type="text" name="ans2" placeholder="Enter choice two..." required></td>
                </tr>
                <tr>
                    <td>Choice three</td>
                    <td>:</td>
                    <td><input type="text" name="ans3" placeholder="Enter choice three..." required></td>
                </tr>
                <tr>
                    <td>Choice four</td>
                    <td>:</td>
                    <td><input type="text" name="ans4" placeholder="Enter choice four..." required></td>
                </tr>
                <tr>
                    <td>Correct No</td>
                    <td>:</td>
                    <td><input type="number" name="rightAnswer"></td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><input type="submit" value="Add a question"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
