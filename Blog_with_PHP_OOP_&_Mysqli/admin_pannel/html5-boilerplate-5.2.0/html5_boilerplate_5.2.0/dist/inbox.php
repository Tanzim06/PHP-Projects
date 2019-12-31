<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
                    <div>
                    </div>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Message Option</h2>
                            <?php
if(isset($_GET['seenid'])){
    $seenid=$_GET['seenid'];
      $query= "UPDATE tbl_contact SET status= '1' WHERE id= '$seenid' ";
                                     $catupdate= $db->update($query);
                                     if($catupdate){
                                         echo"<span class='success'>Message sent to seen box</span>";
                                     }else{
                                         echo"<span class='error'>Something wrong!!</span>";
                                     }
}
?>
                            <form action="" method="post">
                                
                            </form>
                            <div class="catoption">
                            <h2>Message List:</h2>
                            <table class="mytable">
                                <tr>
                                    <th width="20%">No.</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Message</th>
                                    <th width="20%">Date</th>
                                    <th width="30%">Action</th>
                                </tr>
                                <?php
                                $query="SELECT * FROM tbl_contact WHERE status='0' ";
                                $msg =$db->select($query);
                                if($msg){
                                    $i=0;
                                    while($result= $msg->fetch_assoc()){
                                        $i++;                                  
                                ?>
                                <tr>
                                    <td width="20%"><?php echo $i; ?></td>
                                    <td width="20%"><?php echo $result['firstname'].' '.$result['lastname'] ?></td>
                                    <td width="20%"><?php echo $result['email'] ?></td>
                                    <td width="20%"><?php echo $frmt->textShorting($result['body'], 30) ?></td>
                                    <td width="20%"><?php echo $frmt->formatDate($result['date']) ?></td>
                                    <td><a href="viewmsg.php?msgid=<?php echo $result['id'] ?>">View</a>||<a href="replymsg.php?msgid=<?php echo $result['id'] ?>">Reply</a>||<a onclick="return confirm('Send message to seenbox!')" href="?seenid=<?php echo $result['id'] ?>">Seen</a></td>
                                </tr>
                                <?php } } ?>
                            </table>
                        </div>
                      </div>
                        
                        <div class="content">
                            <div class="catoption">
                            <h2>Seen List:</h2>
                             <?php
                            if(isset($_GET['delid'])){
                                $delid= $_GET['delid'];
                                $delquery="DELETE FROM tbl_contact where id= '$delid' ";
                                $deldata= $db->delete($delquery);
                                if($deldata){
                                     echo"<span class='success'>Message deleted successfully</span>";
                                }else{
                                    echo"<span class='error'>Message not deleted!!</span>";
                                }
                            }
                            ?>
                            <table class="mytable">
                                <tr>
                                    <th width="20%">No.</th>
                                    <th width="20%">Name</th>
                                    <th width="20%">Email</th>
                                    <th width="20%">Message</th>
                                    <th width="20%">Date</th>
                                    <th width="30%">Action</th>
                                </tr>
                                <?php
                                $query="SELECT * FROM tbl_contact WHERE status='1' ";
                                $msg =$db->select($query);
                                if($msg){
                                    $i=0;
                                    while($result= $msg->fetch_assoc()){
                                        $i++;                                  
                                ?>
                                <tr>
                                    <td width="20%"><?php echo $i; ?></td>
                                    <td width="20%"><?php echo $result['firstname'].' '.$result['lastname'] ?></td>
                                    <td width="20%"><?php echo $result['email'] ?></td>
                                    <td width="20%"><?php echo $frmt->textShorting($result['body'], 30) ?></td>
                                    <td width="20%"><?php echo $frmt->formatDate($result['date']) ?></td>
                                    <td><a onclick="return confirm('Are you sure to delete!')" href="?delid=<?php echo $result['id'] ?>">Delete</a></td>
                                </tr>
                                <?php } } ?>
                            </table>
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

         Google Analytics: change UA-XXXXX-X to be your site's ID. 
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
