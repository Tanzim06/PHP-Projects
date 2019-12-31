<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
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
                                     $query= "INSERT INTO  tbl_category(name) VALUES('$name')";
                                     $catinsert= $db->insert($query);
                                     if($catinsert){
                                         echo"<span class='success'>Category inserted successfully</span>";
                                     }else{
                                         echo"<span class='error'>Category not inserted!!</span>";
                                     }
                                 }
                            }
                            ?>
                            <?php if (BlogSession::get('userrole')=='1') {?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Add Category:</td>
                                        <td><input type="text" name="name" placeholder="Plaese Enter a category name"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Add"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php } ?>
                            <div class="catoption">
                            <h2>Category List:</h2>
                            <?php
                            if(isset($_GET['delcat'])){
                                $delid= $_GET['delcat'];
                                $delquery="DELETE FROM tbl_category where id= '$delid' ";
                                $deldata= $db->delete($delquery);
                                if($deldata){
                                     echo"<span class='success'>Category deleted successfully</span>";
                                }else{
                                    echo"<span class='error'>Category not deleted!!</span>";
                                }
                            }
                            ?>
                            <table class="mytable">
                                <tr>
                                    <th width="20%">No.</th>
                                    <th width="50%">Category Name:</th>
                                   <?php if (BlogSession::get('userrole')=='1' || BlogSession::get('userrole')=='3') {?>
                                    <th width="30%">Action:</th>
                                   <?php } ?>
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
                                    <?php if (BlogSession::get('userrole')=='1') {?>
                                    <td><a href="editcategory.php?catid=<?php echo $result['id'] ?>">Edit</a>||
                                          <a onclick="return confirm('Are you sure to delete!')" href="?delcat=<?php echo $result['id'] ?>">Delete</a></td>
                                    <?php }elseif(BlogSession::get('userrole')=='3'){ ?>
                                    <td><a href="editcategory.php?catid=<?php echo $result['id'] ?>">Edit</a></td>
                                    <?php } ?>
                                </tr>
                                <?php 
                                }
                               } ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <?php include '../dist/inc/footerpart.php'; ?>