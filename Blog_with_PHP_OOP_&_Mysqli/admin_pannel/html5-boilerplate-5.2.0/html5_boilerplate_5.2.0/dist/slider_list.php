<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Slider List</h2>
                            
                            <div class="catoption">
                            
                            <table class="mytable">
                                <tr>
                                    <th>No.</th>
                                    <th>Slider Title</th>
                                    <th>Slider Image</th>
                                    <?php if (BlogSession::get('userrole')=='1') {?>
                                    <th>Action</th>
                                    <?php } ?>
                                </tr>
                                <?php
                                $query="SELECT * FROM tbl_slider";
                                $slider= $db->select($query);
                                if($slider){
                                    $i=0;
                                    while ($result=$slider->fetch_assoc()){
                                        $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['title'];?></td>
                                    <td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>
                                    <td>
                                    <?php if (BlogSession::get('userrole')=='1') {?> 
                                        <a href="edit_slider.php?sliderid=<?php echo $result['id']; ?>">Edit</a> 
                                        ||
                                        <a onclick="return confirm('Are you sure to delete!')" href="delete_slider.php?sliderid=<?php echo $result['id']; ?>">Delete</a>
                                        <?php } ?>
                                        </td>
                                </tr>
                         <?php
                              }
                                }
                         ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <?php include '../dist/inc/footerpart.php'; ?>