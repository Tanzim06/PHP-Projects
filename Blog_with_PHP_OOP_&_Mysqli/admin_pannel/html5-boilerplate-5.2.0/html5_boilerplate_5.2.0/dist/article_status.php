<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Article List</h2>
                            
                            <div class="catoption">
                            
                            <table class="mytable">
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="15%">Title</th>
                                    <th width="25%">Description</th>
                                    <th width="10%">Category</th>
                                    <th width="10%">Image</th>
                                    <th width="10%">Author</th>
                                    <th width="10%">Date</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Action</th>
                                </tr>
                                <?php
                                $query="SELECT tbl_post.*,tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat=tbl_category.id ORDER BY tbl_post.title";
                                $post= $db->select($query);
                                if($post){
                                    $i=0;
                                    while ($result=$post->fetch_assoc()){
                                        $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['title'];?></td>
                                    <td><?php echo $frmt->TextShorting($result['body'],50); ?></td>
                                    <td><?php echo $result['name']; ?></td>
                                    <td><img src="<?php echo $result['image'];?>" height="40px" width="60px"/></td>
                                    <td><?php echo $result['author']; ?></td>
                                    <td><?php echo $frmt->formatDate($result['date']);?></td>
                                    <td><?php if($result['status']=='1'){echo 'Unpublished';}elseif($result['status']=='2'){echo  'Published';}?></td>
                                     
                                    <?php if (BlogSession::get('userId') == $result['userrank'] || BlogSession::get('userrole')=='1') {?> 
                                    <td><a href="publish.php?status_id=<?php echo $result['id']; ?>">Publish</a>
                                        ||
                                        <a onclick="return confirm('Are you sure to Un publish this article!')" href="unpublish.php?status_id=<?php echo $result['id']; ?>">Un publish</a></td>
                                      
                         <?php
                                }
                              }
                            }
                         ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <?php include '../dist/inc/footerpart.php'; ?>

                

                
                