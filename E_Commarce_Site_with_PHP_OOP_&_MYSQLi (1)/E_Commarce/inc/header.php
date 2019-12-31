<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<?php
include 'lib/ec_Database.php';
include 'helpers/ec_Format.php';
?>
<?php
spl_autoload_register(function($class) {
    include_once 'classes/' . $class . '.php';
});
?>
<?php
$db = new ec_Database();
$fm = new ec_Format();
$frontproduct = new ClassProduct();
$ClassCart = new ClassCart();
$ClassCate = new ClassCategory();
$ClassCustomer = new ClassCustomer();
?>
<?php
include dirname(__dir__) . '/lib/ec_Session.php';
ec_Session::init();
?>
<!DOCTYPE HTML>
<head>
    <title>Store Website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script> 
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        $(document).ready(function ($) {
            $('#dc_mega-menu-orange').dcMegaMenu({rowItems: '4', speed: 'fast', effect: 'fade'});
        });
    </script>
</head>
<body>
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href="index.php"><img src="images/logo.png" alt="" /></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form action="search.php" method="get">
                        <input type="text" name="search" placeholder="Search for Products"><input type="submit" value="SEARCH">
                    </form>
                </div>
                <div class="shopping_cart">
                    <div class="cart">
                        <a href="#" title="View my shopping cart" rel="nofollow">
                            <span class="cart_title">Cart</span>
                            <span class="no_product">
                                <?php
                                $CheckCart = $ClassCart->CheckCart();
                                if ($CheckCart) {
                                    $sum = ec_Session::get("sum");
                                    $qnty = ec_Session::get("qnty");
                                    echo "$" . $sum . " | Qnti:" . $qnty;
                                } else {
                                    echo"(Empty)";
                                }
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
                 <?php
                if (isset($_GET['cid'])) {
                    $custid= ec_Session::get("custid");
                    $DelProduct = $ClassCart->DelCustomerCart();
                    $DelCompareData = $frontproduct->DelCompareData($custid);
                    ec_Session::destroy();
                }
                ?>
                <?php
                $login = ec_Session::get("custlogin");
                if ($login == false) {
                    ?>
                    <div class="login"><a href="login.php">Login</a></div>
                <?php } else { ?>
                    <div class="login"><a href="?cid=<?php ec_Session::get('custid')?>">Logout</a></div>
                  <?php } ?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="menu">
            <ul id="dc_mega-menu-orange" class="dc_mm-orange">
                <li><a href="index.php">Home</a></li>
                <li><a href="topbrands.php">Top Brands</a></li>
                <?php
                $login= ec_Session::get("custlogin");
                if($login== true){?>
                   <li><a href="profile.php">Profile</a></li>
               <?php } ?>
                 <?php
                 $CheckPayment= $ClassCart->CheckCart();
                 if($CheckPayment){?>
                  <li><a href="cart.php">Cart</a></li>
                  <li><a href="payment.php">Payment</a></li>
                     <?php } ?>
                 <?php
                 $custid= ec_Session::get("custid");
                 $CheckOrder= $ClassCart->CheckOrder($custid);
                 if($CheckOrder){?>
                  <li><a href="orderdetails.php">Order List</a></li>
                     <?php } ?>
                  <?php
                            $Getpro= $frontproduct->GetCompareData($custid);
                            if($Getpro){
                  ?>
                <li><a href="compare.php">Compare</a> </li>
                <?php } ?>
                <?php
                            $CheckWishList= $frontproduct->CheckWishList($custid);
                            if($CheckWishList){
                  ?>
                <li><a href="wishlist.php">Wishlist</a> </li>
                <?php } ?>
                <li><a href="contact.php">Contact</a></li>
                <div class="clear"></div>
            </ul>
        </div>