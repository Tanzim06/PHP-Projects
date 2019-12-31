<?php include './inc/header.php'; ?>
<?php
if(isset($_GET['proid'])){
    $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['proid']);
}
?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'&& isset($_POST['submit'])){
    $Quantity= $_POST['Quantity'];
    
    $AddCart = $ClassCart->AddToCart($Quantity, $id);
}
?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['compare'])){
    $ProductId= $_POST['ProductId'];
    $InsertcompareData= $frontproduct->InsertCompareData($ProductId, $custid);
}
?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['wlist'])){
    $SaveWishList= $frontproduct->SaveWishList($id, $custid);
}
?>
<style>
    .mybutton{width: 100px; float: left; margin-right: 50px}
</style>
        <div class="main">
            <div class="content">
                <div class="section group">
                    <div class="cont-desc span_1_of_2">
                        <?php
                        $GetProduct= $frontproduct->GetSingleProduct($id);
                        if($GetProduct){
                            while($result= $GetProduct->fetch_assoc()){
                                
                           
                        ?>
                        <div class="grid images_3_of_2">
                            <img src="<?php echo str_replace('../../','',$result['Image']) ?>" alt="" />
                        </div>
                        <div class="desc span_3_of_2">
                            <h2><?php echo $result['ProductName']?></h2>
                            					
                            <div class="price">
                                <p>Price: <span><?php echo $result['Price']?></span></p>
                                <p>Category: <span><?php echo $result['CatName']?></span></p>
                                <p>Brand:<span><?php echo $result['BrandName']?></span></p>
                            </div>
                            <div class="add-cart">
                                <form action="" method="post">
                                    <input type="number" class="buyfield" name="Quantity" value="1"/>
                                    <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
                                </form>				
                            </div>
                            <span style="color: red; font-size: 18px;">
                                <?php
                                if(isset( $AddCart)){
                                    echo $AddCart;
                                }
                                ?>
                            </span>
                           <?php
                                if(isset( $InsertcompareData)){
                                    echo $InsertcompareData;
                                }
                                ?>
                           <?php
                                if(isset( $SaveWishList)){
                                    echo $SaveWishList;
                                }
                                ?>
                            <?php
                            $login= ec_Session::get("custlogin");
                            if($login==true){
                            ?>
                            <div class="add-cart">
                                <div class="mybutton">
                                <form action="" method="post">
                                    <input type="hidden" class="buyfield" name="ProductId" value="<?php echo $result['ProductId']?>"/>
                                    <input type="submit" class="buysubmit" name="compare" value="Add to compare"/>
                                </form>	
                                </div>
                                <div class="mybutton">
                                <form action="" method="post">
                                    <input type="submit" class="buysubmit" name="wlist" value="Save to list"/>
                                </form>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="product-desc">
                            <h2>Product Details</h2>
                            <?php echo $result['Body']?>
                        </div>
                        <?php 
                         }
                        }
                        ?>
                    </div>
                    <div class="rightsidebar span_3_of_1">
                        <h2>CATEGORIES</h2>
                        <ul>
                            <?php
                            $GetCat= $ClassCate->GetAllCat();
                            if($GetCat){
                                while($result = $GetCat->fetch_assoc()){
                            ?>
                            <li><a href="productbycat.php?CatId=<?php echo $result['CatId']?>"> <?php echo $result['CatName']?></a></li>
                           <?php
                            }
                            }
                           ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
       <?php include './inc/footer.php'; ?>