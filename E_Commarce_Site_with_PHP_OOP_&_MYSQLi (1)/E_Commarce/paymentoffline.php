<?php include './inc/header.php'; ?>
<?php
$login= ec_Session::get("custlogin");
if($login == false){
    header("Location: login.php");
}
?>
<?php
if(isset($_GET['orderid'])&& $_GET['orderid']=='order'){
    $custid= ec_Session::get("custid");
    $insertorder=$ClassCart->OrderProduct($custid);
    $DelProduct = $ClassCart->DelCustomerCart();
    header("Location:success.php");
}
?>
<style>
    .division{width: 50%; float: left;}
    .tblone{width: 500px; margin: 0 auto; border: 2px solid #ddd;}
    .tbltwo{float:right;text-align:left; width:50%;border: 2px solid #ddd;margin-right: 14px; margin-top:12px;}
    .tbltwo tr td{text-align: justify; padding: 5px 10px;}
    .ordernow{padding-bottom: 30px;}
    .ordernow a{width: 200px; margin: 20px auto 0; text-align: center; padding: 5px; font-size: 30px; display: block; background: #FF0000; color: #fff; border-radius: 3px;}
</style>
        <div class="main">
            <div class="content">
                <div class="section group">
                    <div class="division">
                        <table class="tblone">
                            <tr>
                                <th>Serial No</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
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
                                <td><?php echo $result['Price'] ?></td>
                                <td><?php echo $result['Quantity'] ?></td>
                                <td>$<?php 
                                $total= $result['Price'] * $result['Quantity'];
                                echo $total;
                                        ?></td>
                            </tr>
                            <?php
                            $qnty= $qnty + $result['Quantity'];
                            $sum= $sum + $total;
                            ?>
                            <?php
                            }
                            }
                            ?>
                        </table>

                        <table class="tbltwo" width="40%">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>$<?php echo $sum; ?></td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>:</td>
                                <td>10% ($<?php echo $vat= $sum*0.1; ?>)</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td>$<?php
                                $vat= $sum*0.1;
                                $gtotal= $sum+$vat;
                                echo $gtotal;
                                ?></td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>:</td>
                                <td><?php echo $qnty; ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="division">
                        <?php
                    $id= ec_Session::get("custid");
                    $getData= $ClassCustomer->GetCustomerData($id);
                    if($getData){
                        while($result=$getData->fetch_assoc()){
                    ?>
                    <table class="tblone">
                        <tr><td colspan="3"><h2>Your Profile Details</h2></td></tr>
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><?php echo $result['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $result['address']; ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td><?php echo $result['city']; ?></td>
                        </tr>
                        <tr>
                            <td>Zip code</td>
                            <td>:</td>
                            <td><?php echo $result['zipcode']; ?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td><?php echo $result['country']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td><?php echo $result['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $result['email']; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><a href="editprofile.php">Update Details</a></td>
                        </tr>
                    </table>
                    <?php
                     }
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="ordernow">
                <a href="?orderid=order">Order</a>
            </div>
        </div>
       <?php include './inc/footer.php'; ?>




