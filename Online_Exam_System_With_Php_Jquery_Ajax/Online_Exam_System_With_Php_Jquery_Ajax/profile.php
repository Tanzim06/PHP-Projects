<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$userid= Session::get("userid");
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$updateuser= $Front_User->UpdateUserData($userid, $_POST);
}
?>
<style>
    .profile{width: 440px; margin: 0 auto; border: 1px solid #ddd; padding:30px 50px 50px 138px;}
</style>
<div class="main">
<h1>Update Your Profile</h1>
<div class="profile">
    <?php
    if(isset($updateuser)){
        echo $updateuser;
    }
    ?>
    <?php
$getData= $Front_User->GetUserDataById($userid);
if($getData){
    while($result= $getData->fetch_assoc()){
?>
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Name</td>
                           <td><input name="name" type="text" value="<?php echo $result['name'] ?>" required></td>
			 </tr>
			 <tr>
			   <td>Username</td>
                           <td><input name="username" type="text" value="<?php echo $result['username'] ?>" required></td>
			 </tr>
			 <tr>
			   <td>Email</td>
                           <td><input name="email" type="text" value="<?php echo $result['email'] ?>" required></td>
			 </tr>
			 
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="update" value="update">
			   </td>
			 </tr>
       </table>
	   </form>
    <?php
        }
}
    ?>
    </div>
	</div>
<?php include 'inc/footer.php'; ?>
