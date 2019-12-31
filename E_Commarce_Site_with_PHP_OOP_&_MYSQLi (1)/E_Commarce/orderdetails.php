<?php include './inc/header.php'; ?>
<?php
$login= ec_Session::get("custlogin");
if($login == false){
    header("Location: login.php");
}
?>
<?php
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $date= $_GET['time'];
    $price=$_GET['price'];
    $confirm= $ClassCart->ProductShiftConfirm($id, $date, $price);
    header("Location:orderdetails.php");
}
?>
<style>
    .notfound{}
    .notfound h2{font-size: 100px; line-height: 130px;text-align: center;}
    .notfound h2 span{display:block; color: red; font-size: 170px;}
</style>
        <div class="main">
            <div class="content">
                <div class="section group">
                    <div class="order">
                        <h2>Your Ordered Details</h2>
                        <table class="tblone">
                            <tr>
                                <th>Serial No</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $custid= ec_Session::get("custid");
                            $Getorder= $ClassCart->GetOrderedProduct($custid);
                            if($Getorder){
                                $i=0;
                                while($result= $Getorder->fetch_assoc()){
                                    $i++;
                                
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['ProductName'] ?></td>
                                <td><img src="<?php echo str_replace('../../','',$result['Image']) ?>" alt=""/></td>
                                <td><?php echo $result['Quantity'] ?></td>
                                <td>$<?php echo $result['Price'];?></td>
                                <td><?php echo $fm->formatDate($result['Date']) ?></td>
                                <td><?php 
                                if($result['Status'] == '1'){
                                    echo "Pending";
                                } elseif($result['Status']=='2'){
                                echo"Shifted";
                                }else{
                                    echo"Ok";
                                }
                                ?>
                                </td>
                                
                                <?php
                                if($result['Status']=='2'){
                                ?>
                                <td><a href="?id=<?php echo $result['Id'] ?>&price=<?php echo $result['Price'] ?>&time=<?php echo $result['Date'] ?>">Confirm</a></td>
                                <?php
                                }elseif($result['Status']=='3'){
                                ?>
                                <td>Ok</td>
                                <?php
                                }elseif($result['Status'] == '1'){?>
                                <td>N/A</td>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php
                            }
                            }
                            ?>
                        </table>
                    </div>
                </div> 	
                <div class="clear"></div>
            </div>
        </div>
        <?php include './inc/footer.php'; ?>