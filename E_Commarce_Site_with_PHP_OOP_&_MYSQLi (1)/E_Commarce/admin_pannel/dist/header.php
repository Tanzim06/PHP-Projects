<?php include '../dist/inc/headerpart.php'; ?>
<?php include '../dist/inc/sidebarpart.php'; ?>
<!doctype html>
                    <article class="maincontent clear">
                        <div class="content">
                            <h2>Header Option</h2>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Update Title:</td>
                                        <td><input type="text" name="title" value="Your website title"/></td>
                                    </tr>
                                    <tr>
                                        <td>Update Description:</td>
                                        <td><input type="text" name="description" value="Your website slogan"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" value="submit"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </article>
                </section>
  <?php include '../dist/inc/footerpart.php'; ?>

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
