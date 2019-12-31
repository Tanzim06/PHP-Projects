<?php include './inc/headerpart.php'; ?>
<?php include './inc/sidebarpart.php'; ?>
<?php include'../../classes/ClassCustomer.php' ?>
<?php
if(!isset($_GET['custId']) || $_GET['custId']== NULL){
    echo "<script>window.location='inbox.php'</script>";
}else{
    $id= $_GET['custId'];
     $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['custId']);
}
?>
<?php $classcustomer= new ClassCustomer() ?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    echo "<script>window.location='inbox.php'</script>";
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Customer Details</h2>
                            
                            <?php
                            $GetCustomer= $classcustomer->GetCustomerData($id);
                            if($GetCustomer){
                                while($result= $GetCustomer->fetch_assoc()){
                           
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" readonly="readonly" value="<?php echo $result['name']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Address:</td>
                                        <td><input type="text" readonly="readonly" value="<?php echo $result['address']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>City:</td>
                                        <td><input type="text" readonly="readonly" value="<?php echo $result['city']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Country:</td>
                                        <td><input type="text" readonly="readonly" value="<?php echo $result['country']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Zip code:</td>
                                        <td><input type="text" readonly="readonly" value="<?php echo $result['zipcode']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Phone:</td>
                                        <td><input type="text" readonly="readonly" value="<?php echo $result['phone']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="text" readonly="readonly" value="<?php echo $result['email']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Ok"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php  } } ?>
                            </div>
                    </article>
                </section>
                <?php include './inc/footerpart.php'; ?>