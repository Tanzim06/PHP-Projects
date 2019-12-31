<?php
if(!isset($_GET['search']) || $_GET['search'] == NULL){
   header("Location: index.php");
}else{
    $search= $_GET['search'];
}                 
?>
<?php include './inc/header.php'; ?>
<?php
$GetSearchProduct= $frontproduct->GetSearchedProduct($search);
if($GetSearchProduct){
    while($result= $GetSearchProduct->fetch_assoc()){   
?>
        <div class="main">
            <div class="content">
                <div class="content_top">
                    <div class="heading">
                        <h3><?php echo $result['ProductName'] ?></h3>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="section group">
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php"><img src="<?php echo str_replace('../../','',$result['Image']) ?>" alt="Product Image" /></a>
                        <h2><?php echo $result['ProductName'] ?></h2>
                        <p><?php echo $result['Body'] ?></p>
                        <p><span class="price"><?php echo $result['Price'] ?></span></p>
                        <div class="button"><span><a href="details.php?proid=<?php echo $result['ProductId'] ?>" class="details">Details</a></span></div>
                    </div>
                </div>
                </div>
            </div>
<?php
    }
}else{
  ?>
<span style="color: red; font-size: 100px;">Product Not found</span>
<?php
}
?>
 <?php include './inc/footer.php'; ?>