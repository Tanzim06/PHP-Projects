<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/inc/header.php');
include_once ($filepath . '/../classes/ClassExam.php');
$ClassExam= new ClassExam();
?>
<?php
if(isset($_GET['delquestion'])){
    $questionNo= (int)$_GET['delquestion'];
    $deletingquestion= $ClassExam->DelQuestion($questionNo);
}
?>
<div class="main">
    <div>
        <h1>Question List</h1>
        <?php
        if(isset($deletingquestion)){
           echo $deletingquestion;
        }
        ?>
<div class="quelist">       
    <table class="tblone">
        <tr>
            <th width="10%">No</th>
            <th width="70%">Question</th>
            <th width="20%">Action</th>
        </tr>
        <?php
        $getdata= $ClassExam->GetQuestionByOrder();
        if($getdata){
            $i=0;
            while($result= $getdata->fetch_assoc()){
                $i++;
            
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $result['question'] ?></td>
            <td>
                <a onclick="return confirm('Are you sure to remove!')" href="?delquestion=<?php echo $result['questionNo'] ?>">Remove</a>
            </td>
        </tr>
        <?php 
        }
        }
        ?>
        </table>
     </div>
</div>
<?php include 'inc/footer.php'; ?>

