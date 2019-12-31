<?php include './inc/headerpart.php'; ?>
<?php include './inc/sidebarpart.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassBrand.php'; ?>
<?php
if(!isset($_GET['brandid']) || $_GET['brandid']== NULL){
    echo "<script>window.location='add_brand.php'</script>";
}else{
    $id= $_GET['brandid'];
    $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['brandid']);
}
?>
<?php $classbrand= new ClassBrand() ?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $BrandName= $_POST['BrandName'];
    
    $UpdateBrand = $classbrand->BrandUpdate($BrandName, $id);
}
?>
<?php
if(isset($_GET['delbrand'])){
    $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['delcat']);
    $delcat= $classcategory->DelCatById($id);
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Brand Option</h2>
                            <?php
                            if(isset($UpdateBrand)){
                                echo $UpdateBrand;
                            }
                            ?>
                            <?php
                            $GetBrand= $classbrand->GetBrandById($id);
                            if($GetBrand){
                                while($result= $GetBrand->fetch_assoc()){
                           
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>New Brand:</td>
                                        <td><input type="text" name="BrandName" value="<?php echo $result['BrandName'];?>"</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Update"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php } } ?>
                            <div class="catoption">
                            <h2>Brand List:</h2>
                            <table class="mytable">
                                <tr>
                                    <th width="20%">No.</th>
                                    <th width="50%">Category Name:</th>
                                    <th width="30%">Action:</th>
                                </tr>
                                <?php
                               $GetBrand=  $classbrand->GetAllBrand();
                               if($GetBrand){
                                   $i= 0;
                                   while($result= $GetBrand->fetch_assoc()){
                                       $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['BrandName']; ?></td>
                                    <td><a href="edit_brand.php?brandid=<?php echo $result['BrandId'] ?>">Edit</a>||<a onclick="return confirm('Are you sure to delete!')" href="?delbrand=<?php echo $result['BrandId'] ?>">Delete</a></td>
                                </tr>
                                <?php    }
                               } ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <?php include './inc/footerpart.php'; ?>