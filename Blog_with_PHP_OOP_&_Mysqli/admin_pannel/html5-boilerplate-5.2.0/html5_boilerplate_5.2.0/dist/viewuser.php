<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<?php
if(!isset($_GET['userid']) || $_GET['userid']==NULL){
    header("Location:Add_user.php");
} else{
    $id= $_GET['userid'];
}
?>
   <script src="js/vendor/modernizr-2.8.3.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2>User Details</h2>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                              echo "<script>window.location= 'add_user.php'; </script>";
                          }
                               
                        
                            ?>
                            
                            <?php
                            $query="SELECT * FROM tbl_user WHERE id='$id' ";
                            $getuser= $db->select($query);
                            if($getuser){
                                while($result= $getuser->fetch_assoc()){
                                    
                                
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" readonly value="<?php echo $result['name'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Username:</td>
                                        <td><input type="text" readonly value="<?php echo $result['username'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="text" readonly value="<?php echo $result['email'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Details</td>
                                        <td>
                                            <textarea readonly name="editor1" >
                                            <?php echo $result['details'] ?>
                                            </textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Ok"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php }
                            } ?>
                            </div>
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



