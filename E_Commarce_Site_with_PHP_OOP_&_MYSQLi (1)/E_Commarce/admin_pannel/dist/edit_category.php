<?php include './inc/headerpart.php'; ?>
<?php include './inc/sidebarpart.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassCategory.php'; ?>
<?php
if(!isset($_GET['catid']) || $_GET['catid']== NULL){
    echo "<script>window.location='category.php'</script>";
}else{
    $id= $_GET['catid'];
     $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['id']);
}
?>
<?php $classcategory= new ClassCategory() ?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $CategoryName= $_POST['CategoryName'];
    
    $UpdateCategory= $classcategory->CategoryUpdate($CategoryName, $id);
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Category Option</h2>
                            <?php
                            if(isset($UpdateCategory)){
                                echo $UpdateCategory;
                            }
                            ?>
                            <?php
                            $GetCat= $classcategory->GetCatById($id);
                            if($GetCat){
                                while($result= $GetCat->fetch_assoc()){
                           
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Update Category:</td>
                                        <td><input type="text" name="CategoryName" value="<?php echo $result['CatName']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Update"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php  } } ?>
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
                                    <td><a href="edit_category.php?catid=<?php echo $result['CatId'] ?>">Edit</a>||<a onclick="return confirm('Are you sure to delete!')" href="">Delete</a></td>
                                </tr>
                                <?php    }
                               } ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <?php include './inc/footerpart.php'; ?>