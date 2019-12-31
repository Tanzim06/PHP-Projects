<?php include './inc/header.php'; ?>
<?php
$login= ec_Session::get("custlogin");
if($login == false){
    header("Location: login.php");
}
?>
<style>
    .psuccess{width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto; padding: 20px;}
    .psuccess h2{border-bottom: 1px solid #ddd; margin-bottom: 20px; padding-bottom: 10px;}
    .psuccess p{line-height: 25px;}
</style>
        <div class="main">
            <div class="content">
                <div class="section group">
                    <div class="psuccess">
                        <h2>Order Taken</h2>
                        <?php
                         $custid= ec_Session::get("custid");
                         $amount = $ClassCart->PaybleAmount($custid);
                         if($amount){
                             $sum= 0;
                             while($result= $amount->fetch_assoc()){
                                 $price= $result['Price'];
                                 $sum = $sum+$price;
                             }
                         }
                        ?>
                        <p style="color: red">Total payable amount(including vat) is: $
                        <?php
                        $vat= $sum * 0.1;
                        $total= $sum + $vat;
                        echo $total;
                        ?>
                        </p>
                        <p style="color: red">Your product will reach to you soon</p>
                        <p><a href="orderdetails.php">For details</a></p>
                    </div>
                </div>
            </div>
        </div>
       <?php include './inc/footer.php'; ?>




