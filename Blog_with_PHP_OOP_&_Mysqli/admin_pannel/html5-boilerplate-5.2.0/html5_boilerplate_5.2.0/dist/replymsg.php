
<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<?php
if(!isset($_GET['msgid']) || $_GET['msgid']==NULL){
    header("Location:inbox.php");
} else{
    $id= $_GET['msgid'];
}
?>
<head>
   <script src="js/vendor/modernizr-2.8.3.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2> View Message</h2>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                                  $mailto= $frmt->validation($_POST['mailto']);
                                  $mailfrom= $frmt->validation($_POST['mailfrom']);
                                  $subject= $frmt->validation($_POST['subject']);
                                  $message= $frmt->validation($_POST['editor1']);
                                  $sendmail= mail($mailto, $subject, $message, $mailfrom);
                                  
                                  if($sendmail){
                                      echo "<span class='success'>Mail sent successfully</span>";
                                  }else{
                                      echo "<span class='error'>Mail not sent</span>";
                                  }
                           }
                            ?>
                            <form action="" method="post">
                                <?php
                                $query="SELECT * FROM tbl_contact WHERE id='$id' ";
                                $msg =$db->select($query);
                                if($msg){
                                    while($result= $msg->fetch_assoc()){                                
                                ?>
                                <table>
                                    <tr>
                                        <td>To:</td>
                                        <td><input type="text" readonly name="mailto" value="<?php echo $result['email']?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>From:</td>
                                        <td><input type="text" name="mailfrom" placeholder="Please enter your email address"></td>
                                    </tr>
                                    <tr>
                                        <td>Subject:</td>
                                        <td><input type="text" name="subject" placeholder="Please enter email subject"</td>
                                    </tr>
                                    <tr>
                                        <td>Description:</td>
                                        <td>
                                            <textarea name="editor1" >
                                                
                                            </textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    
                                    
                                    
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Send"></td>
                                    </tr>
                                </table>
                                <?php } } ?> 
                            </form>
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


