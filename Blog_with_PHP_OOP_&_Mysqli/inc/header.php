<?php include './config/config.php'; ?>
<?php include './lib/BlogDatabase.php'; ?>
<?php include './helpers/BlogFolmat.php'; ?>
<?php
$db= new BlogDatabase();
$fm= new BlogFormat();
?>
<!DOCTYPE html>
<html>
    <head>
<?php include'scripts/meta.php' ?>        
<?php include'scripts/css.php' ?>
<?php include 'scripts/js.php' ?>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="headersection templete clear">
            <a href="Index.php">
            <div class="logo">
                <?php
                            $query= "SELECT * FROM title_slogan WHERE id='1' ";
                            $blog_title=$db->select($query);
                            if($blog_title){
                                while($result= $blog_title->fetch_assoc()){
                ?>
                <img src="admin_pannel/<?php echo str_replace('../../../','',$result['logo'])?>" alt="logo"/>
                <h2><?php echo $result['title'];?></h2>
                <p><?php echo $result['slogan'];?></p>
                            <?php } } ?>
            </div>
                </a>
            <div class="social clear">
                <div class="icon clear">
                     <?php
                            $query= "SELECT * FROM tbl_social WHERE id='1' ";
                            $socialmedia=$db->select($query);
                            if($socialmedia){
                                while($result= $socialmedia->fetch_assoc()){
                            ?>
                <a target="_blank" href="<?php echo $result['facebook'] ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a target="_blank" href="<?php echo $result['twitter'] ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a target="_blank" href="<?php echo $result['linkedin'] ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a target="_blank" href="<?php echo $result['googleplus'] ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <?php } } ?>
                </div>
            <div class="searchbtn clear">
                <form action="search.php" method="get">
                    <input type="text" name="search" placeholder="Search Keyword..."/>
                    <input type="submit" value="search">
                </form>
            </div>
         </div>
        </div>
        <div class="navsection templete">
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
                  <!--<li><a href="">Product</a>
                      <ul>
                          <li><a href="">product one</a></li>
                          <li><a href="">product two</a></li>
                          <li><a href="">product three</a></li>
                          <li><a href="">product four</a></li>
                          <li><a href="">product five</a></li>
                          <li><a href="">product six</a></li>
                      </ul>  
                  </li>
                  <li><a href="">Privacy</a></li>
                  <li><a href="">DMCA</a></li>-->
                  <li><a <?php if ($current_page=='Contact_us') {echo ' id="active" ';} ?> href="Contact_us.php">Contact</a>
                      <!--<ul>
                          <li><a href="">Address one</a></li>
                          <li><a href="">Address two</a></li>
                          <li><a href="">Address three</a></li>
                          <li><a href="">Address four</a></li>
                          <li><a href="">Address five</a></li>
                          <li><a href="">Address six</a></li>
                      </ul>-->  
                  </li>
            </ul>
        </div>
        
