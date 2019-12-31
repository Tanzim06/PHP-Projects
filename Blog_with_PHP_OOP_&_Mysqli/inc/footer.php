 <div class="footersecion templete clear">
            <div class="footermenu">
                <ul>
                       <?php
                 $path=$_SERVER['SCRIPT_FILENAME']; //this is a keyword. It's catching the webpage's path from the url box of the browzer.
                 $current_page= basename($path,".php");// "basename()" is a function. it is ereaseing the format part of the page's name.
                 ?>
                  <li><a 
                          <?php if ($current_page=='Index') {echo ' id="active" ';} ?> 
                          href="Index.php">Home</a></li>
                  <?php
                            $query= "SELECT * FROM tbl_page";
                            $pages=$db->select($query);
                            if($pages){
                                while($result= $pages->fetch_assoc()){
                            ?>
                                <li><a 
                                        <?php
                                        if(isset($_GET['page_id']) && $_GET['page_id']==$result['id']){
                                            echo ' id="active" ';
                                        }
                                        ?>
                                        href="page.php?page_id=<?php echo $result['id']  ?>"><?php echo $result['name'] ?></a></li>
                            <?php } } ?>
                   <li><a <?php if ($current_page=='Contact_us') {echo ' id="active" ';} ?> href="Contact_us.php">Contact</a><li>
                </ul>
            </div>
                    <?php
                            $query= "SELECT * FROM tbl_footer WHERE id='1' ";
                            $footer=$db->select($query);
                            if($footer){
                                while($result= $footer->fetch_assoc()){
                            ?>
     <p>&copy;<?php echo $result['footernote']?>&nbsp;<?php echo date('Y') ?></p>
             <?php } } ?>
        </div>
        <div class="fixedicon clear">
            <?php
                            $query= "SELECT * FROM tbl_social WHERE id='1' ";
                            $socialmedia=$db->select($query);
                            if($socialmedia){
                                while($result= $socialmedia->fetch_assoc()){
                            ?>
            <a target="_blank" href="<?php echo $result['facebook'] ?>"><img src="admin_pannel/Uploads/images/social/FB.png" alt="Facebook"/></a>
            <a target="_blank" href="<?php echo $result['twitter'] ?>"><img src="admin_pannel/Uploads/images/social/Tw.png" alt="Twitter"/></a>
            <a target="_blank" href="<?php echo $result['googleplus']?>"><img src="admin_pannel/Uploads/images/social/G+.png" alt="Google plus"/></a>
            <a target="_blank" href="<?php echo $result['linkedin'] ?>"><img src="admin_pannel/Uploads/images/social/IN.png" alt="Linkedin"/></a>
                            <?php } } ?>
        </div>
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-XXXXX-X']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript" src="js/scrolltop.js"></script>
    </body>
</html>
