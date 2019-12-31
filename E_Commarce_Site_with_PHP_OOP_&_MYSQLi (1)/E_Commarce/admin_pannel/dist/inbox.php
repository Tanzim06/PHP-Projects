<?php include './inc/headerpart.php'; ?>
<?php include './inc/sidebarpart.php'; ?>
<?php include '../../classes/ClassCart.php'; ?>
<?php
$ClassCart= new ClassCart();
$frmt= new ec_Format();
?>
<?php
if(isset($_GET['shiftid'])){
    $id= $_GET['shiftid'];
    $date= $_GET['time'];
    $price=$_GET['price'];
    $shift= $ClassCart->ProductShifted($id, $date, $price);
    header("Location:inbox.php");
}
if(isset($_GET['delproid'])){
    $id= $_GET['delproid'];
    $date= $_GET['time'];
    $price=$_GET['price'];
    $delorder= $ClassCart->DelProductShifted($id, $date, $price);
    header("Location:inbox.php");
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Inbox Option</h2>
                            <?php
                            if(isset($shift)){
                                echo $shift;
                            }
                            ?>
                            <?php
                            if(isset($delorder)){
                                echo $delorder;
                            }
                            ?>
                            <div class="catoption">
                            <h2>Order List:</h2>
                            <table class="mytable">
                                <tr>
                                    <th>Id</th>
                                    <th>Order Time</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Customer Id</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $GetOrder= $ClassCart->GetAllOrderProduct();
                                if($GetOrder){
                                    while($result= $GetOrder->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo $result['Id'] ?></td>
                                    <td><?php echo $frmt->formatDate($result['Date']) ?></td>
                                    <td><?php echo $result['ProductName'] ?></td>
                                    <td><?php echo $result['Quantity'] ?></td>
                                    <td>$<?php echo $result['Price'] ?></td>
                                    <td><?php echo $result['CustId'] ?></td>
                                    <td><a href="customer.php?custId=<?php echo $result['CustId'] ?>">View Details</a></td>
       
                                    <?php if($result['Status'] == '1'){ ?>
                                        <td><a href="?shiftid=<?php echo $result['Id'] ?>&price=<?php echo $result['Price'] ?>&time=<?php echo $result['Date']?>">Shifted</a></td>
                                    <?php } elseif($result['Status'] == '2'){ ?>
                                        <td>Pending</td>
                                    <?php }else{ ?>
                                        <td><a href="?delproid=<?php echo $result['Id'] ?>&price=<?php echo $result['Price'] ?>&time=<?php echo $result['Date']?>">Remove</a></td>
                                    <?php } ?>
                                        
                                </tr>
                                <?php
                                }
                                } 
                                ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <?php include './inc/footerpart.php'; ?>