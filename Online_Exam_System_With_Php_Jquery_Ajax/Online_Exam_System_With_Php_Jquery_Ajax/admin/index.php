<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/inc/header.php');
?>
<?php
// Session::checkLogin();
?>
<style>
    .adminpannel{width: 500px; color: #999; margin: 30px auto; padding: 50px; border: 1px solid #ddd;}
</style>
<div class="main">
    <h1>Admin Panel</h1>
    <div class="adminpannel">
        <h2>WELCOME TO ADMIN PANEL</h2>
    </div>



</div>
<?php include 'inc/footer.php'; ?>