<?php  include './inc/headerpart.php' ?>
<?php include './inc/sidebarpart.php'; ?>
<?php include_once dirname(dirname((__DIR__))) .  '/helpers/ec_Format.php'; ?> 
<?php include dirname(dirname(__DIR__)) . '/classes/ClassProduct.php'; ?>
<?php $classproduct= new ClassProduct();
           $frmt= new ec_Format(); 
?>
<?php
if(isset($_GET['delpro'])){
    $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['delpro']);
    $delpro= $classproduct->DelProductById($id);
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Product List</h2>
                            <?php
                            if(isset($delpro)){
                                echo $delpro;
                            }
                            ?>
                            <div class="catoption">
                            
                            <table class="mytable">
                                <tr>
                                    <th width="10%">Serial No.</th>
                                    <th width="15%">Product Name</th>
                                    <th width="30%">Category</th>
                                    <th width="30%">Brand</th>
                                    <th width="30%">Description</th>
                                    <th width="30%">Price</th>
                                    <th width="10%">Image</th>
                                    <th width="15%">Type</th>
                                    <th width="10%">Action</th>
                                </tr>
                                <?php
                                $getproduct= $classproduct->GetAllProduct();
                                if($getproduct){
                                    $i=0;
                                    while($result= $getproduct->fetch_assoc()){
                                        $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $result['ProductName']; ?></td>
                                    <td><?php echo $result['CatName']; ?></td>
                                    <td><?php echo $result['BrandName']; ?></td>
                                    <td><?php echo $frmt->TextShorting($result['Body'], 50); ?></td>
                                    <td>$<?php echo $result['Price']; ?></td>
                                    <td><img src="<?php echo $result['Image']; ?>" hight="40px" width="60px"/></td>
                                    <td><?php
                                          if($result['Type'] == 1){
                                              echo "Fetured";
                                          }else{
                                              echo 'General';
                                          }
                                    ?></td>
                                    <td><a href="edit_product.php?proid=<?php echo $result['ProductId'] ?>">Edit</a>||<a onclick="return confirm('Are you sure to delete!')" href="?delpro=<?php echo $result['ProductId'] ?>">Delete</a></td>
                                </tr>
                                <?php     }
                                } ?>
                            </table>
                        </div>
                      </div>
                    </article>
                </section>
                <footer class="footersection clear">
                    <h3>&copy; Tanzim06</h3>
                </footer>
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
