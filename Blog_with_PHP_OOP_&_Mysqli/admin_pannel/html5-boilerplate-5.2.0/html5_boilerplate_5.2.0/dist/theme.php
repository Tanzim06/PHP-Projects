<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Themes</h2>
                            <?php
                                if($_SERVER['REQUEST_METHOD']=='POST'){
                                 $theme= mysqli_real_escape_string($db->link, $_POST['theme']);
                                 
                                     $query= "UPDATE tbl_theme SET theme= '$theme' WHERE id= '1' ";
                                     $catupdate= $db->update($query);
                                     if($catupdate){
                                         echo"<span class='success'>Theme updated successfully</span>";
                                     }else{
                                         echo"<span class='error'>Theme not updated!!</span>";
                                     }
                                 }
                            
                            ?>
                            <?php
                           $query="SELECT * FROM tbl_theme where id= '1' ";
                            $themes= $db->select($query);
                            while($result=$themes->fetch_assoc()){
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Update Theme:</td>
                                    </tr>
                                    <tr>
                                        <td><input <?php if($result['theme'] == 'default'){echo "checked";} ?> type="radio" name="theme" value="default">Default</td>
                                    </tr>
                                    <tr>
                                        <td><input <?php if($result['theme'] == 'green'){echo "checked";} ?> type="radio" name="theme" value="green">Green</td>
                                    </tr>
                                    <tr>
                                        <td><input <?php if($result['theme'] == 'red'){echo "checked";} ?> type="radio" name="theme" value="red">Red</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Change"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php } ?>
                            <div class="catoption">
                            
                        </div>
                      </div>
                    </article>
                </section>
                <?php include '../dist/inc/footerpart.php'; ?>
