<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Add User</h2>
                            <?php 
                            if(BlogSession::get('userrole')=='1'){
                            ?>
                            <form action="" method="post">
                                <table>
                                    <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    
                                 $username= $frmt->validation($_POST['username']);
                                 $password= $frmt->validation(md5($_POST['password']));
                                 $email= $frmt->validation($_POST['email']);
                                 $role= $frmt->validation($_POST['role']);
                                 
                                 $username= mysqli_real_escape_string($db->link, $username);
                                 $password= mysqli_real_escape_string($db->link, $password);
                                 $email= mysqli_real_escape_string($db->link, $email);
                                 $role= mysqli_real_escape_string($db->link, $role);
                                 
                                if(empty($username) || empty($password) || empty($email) || empty($role)){
                                     echo"<span class='error'>Field must not be empty!!</span>";
                                 }else{
                                 
                                  $mailquery="SELECT * FROM tbl_user WHERE email= '$email' limit 1";
                                $mailcheck =$db->select($mailquery);
                                 
                                if($mailcheck != false){
                                     echo"<span class='error'>Email alrady exist!!</span>";
                                }else{
                                     $query= "INSERT INTO  tbl_user(username, password, email, role) VALUES('$username', '$password', '$email', '$role')";
                                     $catinsert= $db->insert($query);
                                     if($catinsert){
                                         echo"<span class='success'>User created successfully</span>";
                                     }else{
                                         echo"<span class='error'>User not inserted!!</span>";
                                     }
                                 }
                            }
                         }
                          
                            ?>
                                    <tr>
                                        <td>Username:</td>
                                        <td><input type="text" name="username" placeholder="Plaese Enter a  username"/></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><input type="password" name="password"/></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="email" name="email"/></td>
                                    </tr>
                                    <tr>
                                        <td>User Role:</td>
                                        <td>
                                    <select id="select" name="role">
                                        <option value="">Select User role</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Author</option>
                                        <option value="3">Editor</option>
                                    </select>
                                        </td>
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
                            if(isset($_GET['deluser'])){
                                $delid= $_GET['deluser'];
                                $delquery="DELETE FROM tbl_user where id= '$delid' ";
                                $deldata= $db->delete($delquery);
                                if($deldata){
                                     echo"<span class='success'>User deleted successfully</span>";
                                }else{
                                    echo"<span class='error'>User not deleted!!</span>";
                                }
                            }
                            ?>
                            <table class="mytable">
                                <tr>
                                    <th width="20%">No.</th>
                                    <th width="50%">Name:</th>
                                    <th width="50%">Username:</th>
                                    <th width="50%">Email:</th>
                                    <th width="50%">Details:</th>
                                    <th width="50%">Role:</th>
                                    <th width="30%">Action:</th>
                                </tr>
                                <?php
                                $query="SELECT * FROM tbl_user";
                                $category =$db->select($query);
                                if($category){
                                    $i=0;
                                    while($result= $category->fetch_assoc()){
                                        $i++;                                  
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['name'] ?></td>
                                    <td><?php echo $result['username'] ?></td>
                                    <td><?php echo $result['email'] ?></td>
                                    <td><?php echo $frmt->TextShorting( $result['details'], 20) ?></td>
                                    <td><?php 
                                   if($result['role']=='1' ){
                                       echo "Admin";
                                   }elseif($result['role']=='2'){
                                       echo "Author";
                                   }elseif($result['role']=='3'){
                                       echo "Editor";
                                   }
                                            ?></td>
                                    <td><a href="viewuser.php?userid=<?php echo $result['id'] ?>">View</a>
                                        <?php if(BlogSession::get('userrole')=='1'){ ?>
                                         || <a onclick="return confirm('Are you sure to delete!')" href="?deluser=<?php echo $result['id'] ?>">Delete</a></td>
                                        <?php } ?>
                                </tr>
                                <?php   }
                                } ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <?php include '../dist/inc/footerpart.php'; ?>

