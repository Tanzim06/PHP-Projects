<?php include './inc/headerpart.php'; ?>
<?php include './inc/sidebarpart.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassCategory.php'; ?>
<?php $classcategory= new ClassCategory() ?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $CategoryName= $_POST['CategoryName'];
    
    $InsertCategory= $classcategory->CategoryInsert($CategoryName);
}
?>
<?php
if(isset($_GET['delcat'])){
    $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['delcat']);
    $delcat= $classcategory->DelCatById($id);
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Category Option</h2>
                            <?php
                            if(isset($InsertCategory)){
                                echo $InsertCategory;
                            }
                            ?>
                            <?php
                            if(isset($delcat)){
                                echo $delcat;
                            }
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>New Category:</td>
                                        <td><input type="text" name="CategoryName" placeholder="Plaese Enter a category name"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Add"></td>
                                    </tr>
                                </table>
                            </form>
                            <div class="catoption">
                            <h2>Category List:</h2>
                            <table class="mytable">
                                <tr>
                                    <th width="20%">No.</th>
                                    <th width="50%">Category Name:</th>
                                    <th width="30%">Action:</th>
                                </tr>
                                <?php
                               $GetCategory=  $classcategory->GetAllCat();
                               if($GetCategory){
                                   $i= 0;
                                   while($result= $GetCategory->fetch_assoc()){
                                       $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['CatName']; ?></td>
                                    <td><a href="edit_category.php?catid=<?php echo $result['CatId'] ?>">Edit</a>||<a onclick="return confirm('Are you sure to delete!')" href="?delcat=<?php echo $result['CatId'] ?>">Delete</a></td>
                                </tr>
                                <?php    }
                               } ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <?php include './inc/footerpart.php'; ?>