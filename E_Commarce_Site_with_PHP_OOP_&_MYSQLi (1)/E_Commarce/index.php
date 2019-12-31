<?php include './inc/header.php'; ?>
<?php include './inc/slider.php'; ?>
<?php
//echo session_id(); //every brouser has a unique session id. "session_id()" is a function that can track that unique session id.
?>
        <div class="main">
            <div class="content">
                <div class="content_top">
                    <div class="heading">
                        <h3>Feature Products</h3>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="section group">
                    <?php
                    $Getfp=$frontproduct->GetFeturedProduct();
                    if($Getfp){
                        while($result= $Getfp->fetch_assoc()){
                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?proid=<?php echo $result['ProductId'] ?>"><img src="<?php echo str_replace('../../','',$result['Image']) ?>" alt="" /></a>
                        <h2><?php echo $result['ProductName']?></h2>
                        <p><?php echo $fm->TextShorting($result['Body'], 60)?></p>
                        <p><span class="price">$<?php echo $result['Price']?></span></p>
                        <div class="button"><span><a href="details.php?proid=<?php echo $result['ProductId'] ?>" class="details">Details</a></span></div>
                    </div>
                    <?php }
                    } ?>
                </div>
                <div class="content_bottom">
                    <div class="heading">
                        <h3>New Products</h3>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="section group">
                    <?php
                    $Getnp=$frontproduct->GetNewProduct();
                    if($Getnp){
                        while($result= $Getnp->fetch_assoc()){
                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                       <a href="details.php?proid=<?php echo $result['ProductId'] ?>"><img src="<?php echo str_replace('../../','',$result['Image']) ?>" alt="" /></a>
                        <h2><?php echo $result['ProductName']?></h2>
                        <p><span class="price">$<?php echo $result['Price']?></span></p>
                        <div class="button"><span><a href="details.php?proid=<?php echo $result['ProductId'] ?>" class="details">Details</a></span></div>
                    </div>
                    <?php } } ?>
                </div>
            </div>
        </div>
    <?php include './inc/footer.php'; ?>