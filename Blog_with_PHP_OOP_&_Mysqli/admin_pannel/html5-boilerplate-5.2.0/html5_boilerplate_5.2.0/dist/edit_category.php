<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<?php
if(!isset($_GET['catid']) || $_GET['catid']==NULL){
    header("Location:category.php");
} else{
    $id= $_GET['catid'];
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Category Option</h2>
                            <?php
                                if($_SERVER['REQUEST_METHOD']=='POST'){
                                  $name= $_POST['name'];
                                 $name= mysqli_real_escape_string($db->link, $name);
                                 if(empty($name)){
                                 echo"<span class='error'>Field must not be empty!!</span>";
                                 }else{
                                     $query= "UPDATE tbl_category SET name= '$name' WHERE id= '$id' ";
                                     $catupdate= $db->update($query);
                                     if($catupdate){
                                         echo"<span class='success'>Category updated successfully</span>";
                                     }else{
                                         echo"<span class='error'>Category not updated!!</span>";
                                     }
                                 }
                            }
                            ?>
                            <?php
                            $query="SELECT * FROM tbl_category where id= '$id' ";
                            $category= $db->select($query);
                            while($result=$category->fetch_assoc()){
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Update Category:</td>
                                        <td><input type="text" name="name" value="<?php echo $result['name']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Update"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php } ?>
                            <div class="catoption">
                            <h2>Category List:</h2>
                            <table class="mytable">
                                <tr>
                                    <th width="20%">No.</th>
                                    <th width="50%">Category Name:</th>
                                    <th width="30%">Action:</th>
                                </tr>
                                <?php
                                $query="SELECT * FROM tbl_category";
                                $category =$db->select($query);
                                if($category){
                                    $i=0;
                                    while($result= $category->fetch_assoc()){
                                        $i++;                                  
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['name'] ?></td>
                                    <td><a href="editcategory.php?catid=<?php echo $result['id'] ?>">Edit</a>||<a onclick="return confirm('Are you sure to delete!')" href="editcat.php?delcat=<?php echo $result['id'] ?>">Delete</a></td>
                                </tr>
                                <?php   }
                                } ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <?php include '../dist/inc/footerpart.php'; ?>
