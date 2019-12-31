<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Update Social Profile:</h2>
                             <?php
                             if($_SERVER['REQUEST_METHOD']=='POST'){ 
                                
                                $facebook= $frmt->validation($_POST['facebook']);
                                $twitter= $frmt->validation($_POST['twitter']);
                                $linkedin= $frmt->validation($_POST['linkedin']);
                                $googleplus= $frmt->validation($_POST['googleplus']);
                                
                                 $facebook= mysqli_real_escape_string($db->link, $facebook);
                                 $twitter= mysqli_real_escape_string($db->link, $twitter);
                                 $linkedin= mysqli_real_escape_string($db->link, $linkedin);
                                $googleplus= mysqli_real_escape_string($db->link, $googleplus);
                                if($facebook==""|| $twitter==""|| $linkedin==""|| $googleplus==""){
                                  echo"<span class='error'>Field must not be empty!!</span>";
                              }else{
                                  $query= "UPDATE tbl_social SET facebook='$facebook', twitter='$twitter',  linkedin='$linkedin', googleplus='$googleplus'   WHERE id='1' ";
                                       
                                       $updated_rows= $db->update($query);
                                       
                                       if($updated_rows){
                                                echo "<span class='success'>Post updated successfully</span>";
                             }else{
                                 "<span class='error'>Post Not updated</span>";
                            }
                              }
                             }
                             ?>
                             <?php
                            $query= "SELECT * FROM tbl_social WHERE id='1' ";
                            $socialmedia=$db->select($query);
                            if($socialmedia){
                                while($result= $socialmedia->fetch_assoc()){
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Facebook:</td>
                                        <td><input type="text" name=facebook value="<?php echo $result['facebook'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Twitter:</td>
                                        <td><input type="text" name="twitter" value="<?php echo $result['twitter'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Linked in:</td>
                                        <td><input type="text" name="linkedin" value="<?php echo $result['linkedin'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Google Plus:</td>
                                        <td><input type="text" name="googleplus" value="<?php echo $result['googleplus'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="Update"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php }} ?>
                        </div>
                    </article>
                </section>
                <?php include '../dist/inc/footerpart.php'; ?>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
