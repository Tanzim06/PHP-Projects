<?php include './inc/header.php'; ?>
<?php
if(isset($_GET['delpro'])){
    $DelId= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['delpro']);
    $DelProduct= $ClassCart->DelProductFromCart($DelId);
}
?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $CartId= $_POST['cartId'];
    $Quantity= $_POST['quantity'];
    
    $UpdateCart = $ClassCart->UpdateCartQuantity($Quantity, $CartId);
    
    if($Quantity <=0){
        $DelProduct= $ClassCart->DelProductFromCart($CartId);
    }
}
?>
<?php
if(!isset($_GET['id'])){
    echo "<meta http-equiv='refresh' content='0;URL=?id=live'>"; // this is a code of "meta refresh". It is used to refresh this "cart.php" page for showing the updated cart ammount at the top right cornar in this page
}
?>
        <div class="main">
            <div class="content">
                <div class="cartoption">		
                    <div class="cartpage">
                        <h2>Your Cart</h2>
                        <?php
                        if(isset($UpdateCart)){
                            echo $UpdateCart;
                        }
                        if(isset($DelProduct)){
                            echo $DelProduct;
                        }
                        ?>
                        <table class="tblone">
                            <tr>
                                <th width="5%">Serial No</th>
                                <th width="30%">Product Name</th>
                                <th width="10%">Image</th>
                                <th width="15%">Price</th>
                                <th width="15%">Quantity</th>
                                <th width="15%">Total Price</th>
                                <th width="10%">Action</th>
                            </tr>
                            <?php
                            $Getpro= $ClassCart->GetCartProduct();
                            if($Getpro){
                                $i=0;
                                $sum=0;
                                $qnty= 0;
                                while($result= $Getpro->fetch_assoc()){
                                    $i++;
                                
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['ProductName'] ?></td>
                                <td><img src="<?php echo str_replace('../../','',$result['Image']) ?>" alt=""/></td>
                                <td><?php echo $result['Price'] ?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="hidden" name="cartId" value="<?php echo $result['CartId']?>"/>
                                        <input type="number" name="quantity" value="<?php echo $result['Quantity']?>"/>
                                        <input type="submit" name="submit" value="Update"/>
                                    </form>
                                </td>
                                <td>$<?php 
                                $total= $result['Price'] * $result['Quantity'];
                                echo $total;
                                        ?></td>
                                <td><a onclick="return confirm('Are you sure to delete!');" href="?delpro=<?php echo $result['CartId'] ?>">X</a></td>
                            </tr>
                            <?php
                            $qnty= $qnty + $result['Quantity'];
                            $sum= $sum + $total;
                            ec_Session::set("qnty", $qnty);
                            ec_Session::set("sum", $sum);
                            ?>
                            <?php
                            }
                            }
                            ?>
                        </table>
                         <?php 
                            $GetCart= $ClassCart->CheckCart();
                            if($GetCart){
                            ?>
                        <table style="float:right;text-align:left;" width="40%">
                            <tr>
                                <th>Sub Total : </th>
                                <td>$<?php echo $sum; ?></td>
                            </tr>
                            <tr>
                                <th>VAT : </th>
                                <td>10%</td>
                            </tr>
                            <tr>
                                <th>Grand Total :</th>
                                <td>$<?php
                                $vat= $sum*0.1;
                                $gtotal= $sum+$vat;
                                echo $gtotal;
                                ?></td>
                            </tr>
                        </table>
                        <?php } else{
                            echo "Cart empty! Please shop now.";
                        }
                        
                        ?>
                    </div>
                    <div class="shopping">
                        <div class="shopleft">
                            <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                        </div>
                        <div class="shopright">
                            <a href="payment.php"> <img src="images/check.png" alt="" /></a>
                        </div>
                    </div>
                </div>  	
                <div class="clear"></div>
            </div>
        </div>
        <?php include './inc/footer.php'; ?>