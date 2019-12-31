<?php include './inc/headerpart.php'; ?>
<?php include './inc/sidebarpart.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassBrand.php'; ?>
<?php $classbrand= new ClassBrand() ?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $BrandName= $_POST['BrandName'];
    
    $InsertBrand = $classbrand->BrandInsert($BrandName);
}
?>
<?php
if(isset($_GET['delbrand'])){
    $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['delbrand']);
    $delbrand= $classbrand->DelBrandById($id);
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Brand Option</h2>
                            <?php
                            if(isset($InsertBrand)){
                                echo $InsertBrand;
                            }
                            ?>
                            <?php
                            if(isset($delbrand)){
                                echo $delbrand;
                            }
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>New Brand:</td>
                                        <td><input type="text" name="BrandName" placeholder="Plaese Enter a brand name"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Add"></td>
                                    </tr>
                                </table>
                            </form>
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