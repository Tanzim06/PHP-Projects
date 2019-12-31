<?php include './inc/header.php'; ?>
<?php
$login= ec_Session::get("custlogin");
if($login == false){
    header("Location: login.php");
}
?>
<style>
    table.tblone img {
    height: 100px;
    width: 90px;
}
</style>
        <div class="main">
            <div class="content">
                <div class="cartoption">		
                    <div class="cartpage">
                        <h2>Compare</h2>

                        <table class="tblone">
                            <tr>
                                <th>Serial No</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $custid= ec_Session::get("custid");
                            $Getpro= $frontproduct->GetCompareData($custid);
                            if($Getpro){
                                $i=0;
                                while($result= $Getpro->fetch_assoc()){
                                    $i++;
                                
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['ProductName'] ?></td>
                                <td><?php echo $result['Price'] ?></td>
                                <td><img src="<?php echo str_replace('../../','',$result['Image']) ?>" alt=""/></td>
                                <td><a href="details.php?proid=<?php echo $result['ProductId'] ?>">View</a></td>
                                
                                
                            </tr>
                           
                            <?php
                            }
                            }
                            ?>
                        </table>
                    </div>
                    <div class="shopping">
                        <div class="shopleft" style="width:100%; text-align: center;">
                            <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                        </div>
                    </div>
                </div>  	
                <div class="clear"></div>
            </div>
        </div>
        <?php include './inc/footer.php' ?>