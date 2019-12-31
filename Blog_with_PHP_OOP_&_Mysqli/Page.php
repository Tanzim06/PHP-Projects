<?php

if(!isset($_GET['page_id']) || $_GET['page_id'] == NULL){
    header("Location:404_error.php");
} else{
    $id= $_GET['page_id'];
}
?>
<?php include './inc/header.php' ?>
<?php
                            $pagequery= "SELECT * FROM tbl_page WHERE id='$id' ";
                            $pagedetails=$db->select($pagequery);
                            if($pagedetails){
                                while($result= $pagedetails->fetch_assoc()){
                            ?>
        <div class="contentsection contemplete clear">
            <div class="maincontent clear">
                <div class="about">
                    <h2><?php echo $result['name'] ?></h2>
                    <?php echo $result['body'] ?>
                </div>
            </div>
<?php include './inc/sidebar.php'; ?>
        </div>
<?php } } else{"<script>window.location= 'Index.php';</script>";}?>
<?php include './inc/footer.php'; ?>