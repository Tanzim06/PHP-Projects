<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Footer Option</h2>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                                
                                $footernote= $frmt->validation($_POST['footernote']);
                                
                                 $footernote= mysqli_real_escape_string($db->link, $footernote);

                                if($footernote==""){
                                  echo"<span class='error'>Field must not be empty!!</span>";
                              }else{
                                  $query= "UPDATE tbl_footer SET footernote='$footernote'  WHERE id='1' ";
                                       
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
                            $query= "SELECT * FROM tbl_footer WHERE id='1' ";
                            $footer=$db->select($query);
                            if($footer){
                                while($result= $footer->fetch_assoc()){
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Update Copyright text:</td>
                                        <td><input type="text" name="footernote" value="<?php echo $result['footernote'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="submit"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php } } ?>
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

