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
                                 echo"<script>window.location= 'inbox.php'; </script>";
                           }
                            ?>
                            <form action="" method="post">
                                <?php
                                $query="SELECT * FROM tbl_contact WHERE id='$id' ";
                                $msg =$db->select($query);
                                if($msg){
                                    $i=0;
                                    while($result= $msg->fetch_assoc()){
                                        $i++;                                  
                                ?>
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" readonly name="name" value="<?php echo $result['firstname'].' '.$result['lastname'] ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="text" readonly name="email" value="<?php echo $result['email']?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Date:</td>
                                        <td><input type="text" readonly name="name" value="<?php echo $frmt->formatDate($result['date']) ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Description:</td>
                                        <td>
                                            <textarea readonly name="editor1" >
                                                <?php echo $result['body']?>
                                            </textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    
                                    
                                    
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="OK"></td>
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

