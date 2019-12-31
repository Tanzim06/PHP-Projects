<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<head>
   <script src="js/vendor/modernizr-2.8.3.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2>Add New Page</h2>
                            <?php
                            if($_SERVER['REQUEST_METHOD']=='POST'){ 
                                
                                 $name= mysqli_real_escape_string($db->link, $_POST['name']);
                                 $body= mysqli_real_escape_string($db->link, $_POST['editor1']);

                                 
                              if($name==""|| $body==""){
                                  echo"<span class='error'>Field must not be empty!!</span>";
                              }else{
                                       $query= "INSERT INTO tbl_page(name, body) VALUES('$name', '$body')";
                                       
                                   
                                       
                                       $inserted_rows= $db->insert($query);
                                       
                                       if($inserted_rows){
                                                echo "<span class='success'>Page created successfully</span>";
                             }else{
                                 "<span class='error'>Page not created</span>";
                             }
                            }
                           }
                            ?>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" name="name" placeholder="Plaese Enter a title"/></td>
                                    </tr>
                                    <tr>
                                        <td>Descreption:</td>
                                        <td>
                                        <textarea name="editor1" ></textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    
                                    
                                    
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Create"></td>
                                    </tr>
                                </table>
                            </form>
                            </div>
                      </div>   
                    </article>
                </section>
                <?php include  '../dist/inc/footerpart.php'; ?>
                
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

