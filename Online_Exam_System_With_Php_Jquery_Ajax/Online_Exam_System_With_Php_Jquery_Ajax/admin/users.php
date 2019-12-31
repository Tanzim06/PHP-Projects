<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath . '/inc/header.php');
include_once ($filepath . '/../classes/ClassUser.php');
$ClassUser= new ClassUser();
?>
<?php
// Session::checkLogin();
if(isset($_GET['dis'])){
    $disableid= (int)$_GET['dis']; //(int) is a function which is used here to convert 'dis' from database's data to integer
    $disablinguser= $ClassUser->DisableUser($disableid);
}
if(isset($_GET['ena'])){
    $enableid= (int)$_GET['ena']; //(int) is a function which is used here to convert 'ena' from database's data to integer
    $enablinguser= $ClassUser->EnableUser($enableid);
}
if(isset($_GET['del'])){
    $delid= (int)$_GET['del']; //(int) is a function which is used here to convert 'ena' from database's data to integer
    $deletinguser= $ClassUser->DeleteUser($delid);
}
?>
<div class="main">
        <h1>Manage User</h1>
        <?php
        if(isset($disablinguser)){
            echo $disablinguser;
        }
        if(isset($enablinguser)){
            echo $enablinguser;
        }
        if(isset($deletinguser)){
            echo $deletinguser;
        }
        
        ?>
    <table class="tblone">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $userdata= $ClassUser->GetAllUser();
        if($userdata){
            $i=0;
            while($result= $userdata->fetch_assoc()){
                $i++;
            
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php 
            if($result['status']=='1'){
                echo "<span class='error'>".$result['name'] ."</span>";
            }else{
                echo $result['name'];
            }
            ?></td>
            <td><?php echo $result['username'] ?></td>
            <td><?php echo $result['email'] ?></td>
            <td>
                <?php if($result['status'] == '0'){ ?>
                <a onclick="return confirm('Are you sure to Disable!')" href="?dis=<?php echo $result['userid'] ?>">Disable</a>
                <?php } else{ ?>
                <a onclick="return confirm('Are you sure to Enable!')" href="?ena=<?php echo $result['userid'] ?>">Enable</a>
                <?php } ?>
                ||<a onclick="return confirm('Are you sure to remove!')" href="?del=<?php echo $result['userid'] ?>">Remove</a>
            </td>
        </tr>
        <?php 
        }
        }
        ?>
    </table>
</div>
<?php include 'inc/footer.php'; ?>
