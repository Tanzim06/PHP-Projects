
                <section class="contentsection clear">
                    <aside class="leftsidebar clear">
                        <div class="samesidebar">
                            <h2>Theme Option</h2>
                            <ul>
                                <li><a href="update_social.php">Social option</a></li>
                                <?php if (BlogSession::get('userrole')=='1') {?>
                                <li><a href="header.php">Header option</a></li>
                                <li><a href="footer.php">Footer option</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                         <div class="samesidebar">
                            <h2>UI Option</h2>
                            <ul>
                                <?php if (BlogSession::get('userrole')=='1' || BlogSession::get('userrole')=='3' ) {?>
                                <li><a href="theme.php">Change Site Background</a></li>
                                <?php } ?>
                                <?php if (BlogSession::get('userrole')=='1' || BlogSession::get('userrole')=='3' ) {?>
                                <li><a href="add_slider.php">Add New Slider</a></li>
                                <?php } ?>
                                <li><a href="slider_list.php">Slider List</a></li>
                            </ul>
                        </div>
                        <div class="samesidebar">
                            <h2>Category Option</h2>
                            <ul>
                                <li><a href="category.php">Add Category</a></li>
                            </ul>
                        </div>
                        <div class="samesidebar">
                            <?php if (BlogSession::get('userrole')=='3' || BlogSession::get('userrole')=='1') {?> 
                            <h2>Pages</h2>
                            <ul>
                                <li><a href="add_page.php">Add New Pages</a></li>
                                <?php
                            $query= "SELECT * FROM tbl_page";
                            $pages=$db->select($query);
                            if($pages){
                                while($result= $pages->fetch_assoc()){
                            ?>
                                <li><a href="page.php?page_id=<?php echo $result['id']  ?>"><?php echo $result['name'] ?></a></li>
                            <?php } } ?>
                            </ul>
                             <?php } ?>
                        </div>
                        <div class="samesidebar">
                            <h2>Article option</h2>
                            <ul>
                                <li><a href="add_article.php">Add Article</a></li>
                                <li><a href="article_list.php">Article List</a></li>
                                <li><a href="article_status.php">Article Status</a></li>
                            </ul>
                        </div>
                    </aside>