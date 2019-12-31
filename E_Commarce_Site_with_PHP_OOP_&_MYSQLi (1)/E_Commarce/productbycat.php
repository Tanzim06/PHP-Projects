<?php include './inc/header.php'; ?>
<?php
if(!isset($_GET['CatId']) || $_GET['CatId']== NULL){
    echo "<script>window.location='404_error.php'</script>";
}else{
     $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['CatId']);
}
?>
        <div class="main">
            <div class="content">
                <div class="content_top">
                    <div class="heading">
                        <h3>Latest from category</h3>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="section group">
                    <?php
                    $productbycat= $frontproduct->ProductByCat($id);
                    if($productbycat){
                            while($result=$productbycat->fetch_assoc()){
                        
                    ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="details.php?proid=<?php echo $result['ProductId'] ?>"><img src="<?php echo str_replace('../../','',$result['Image']) ?>" alt="" /></a>
                        <h2><?php echo $result['ProductName']?></h2>
                        <p><?php echo $fm->TextShorting($result['Body'], 60)?></p>
                        <p><span class="price">$<?php echo $result['Price']?></span></p>
                        <div class="button"><span><a href="details.php?proid=<?php echo $result['ProductId'] ?>" class="details">Details</a></span></div>
                    </div>
                    <?php
                    }
                    }else{
                        header('Location: 404_error.php');
                        //echo '<p>Products of this category are not available!</p>';
                    }
                    ?>
            </div>
        </div>
        <?php include './inc/footer.php'; ?>