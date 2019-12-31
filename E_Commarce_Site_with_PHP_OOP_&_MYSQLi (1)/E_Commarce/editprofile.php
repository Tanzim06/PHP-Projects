<?php include './inc/header.php'; ?>
<?php
$login= ec_Session::get("custlogin");
if($login == false){
    header("Location: login.php");
}
?>
<?php
$custid= ec_Session::get("custid");
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['submit'])){
    $UpdateCustomerPro= $ClassCustomer->UpdateCustomerProfile($_POST, $custid);
}
?>
<style>
    .tblone{width: 550px; margin: 0 auto; border: 2px solid #ddd;}
    .tblone input[type="text"]{width:400px;padding: 5px; font-size: 15px;}
</style>
        <div class="main">
            <div class="content">
                <div class="section group">
                    <?php
                    $id= ec_Session::get("custid");
                    $getData= $ClassCustomer->GetCustomerData($id);
                    if($getData){
                        while($result=$getData->fetch_assoc()){
                    ?>
                    <form action="" method="post">
                    <table class="tblone">
                        <tr><td colspan="2"><h2>Update Profile Details</h2></td></tr>
                        <?php
                        if(isset($UpdateCustomerPro)){
                            echo "<tr><td colspan='2'><h2>".$UpdateCustomerPro."</h2></td></tr>";
                        }
                        ?>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?php echo $result['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="address" value="<?php echo $result['address']; ?>"></td>
                        </tr>
                        <tr>
                            <td>City</td>
                           <td><input type="text" name="city" value="<?php echo $result['city']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Zip code</td>
                            <td><input type="text" name="zipcode" value="<?php echo $result['zipcode']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><input type="text" name="country" value="<?php echo $result['country']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><input type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?php echo $result['email']; ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Update"></td>
                        </tr>
                    </table>
                    </form>
                    <?php
                     }
                    }
                    ?>
                </div>
            </div>
        </div>
       <?php include './inc/footer.php'; ?>


