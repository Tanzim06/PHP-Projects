<?php include './inc/headerpart.php' ?>
<?php include './inc/sidebarpart.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassCategory.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassBrand.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassProduct.php'; ?>
<?php
if(!isset($_GET['proid']) || $_GET['proid']== NULL){
    echo "<script>window.location='product_list.php'</script>";
}else{
    $id= $_GET['proid'];
     $id= preg_replace('/[^-a-zA-Z0-9_]/', ' ', $_GET['proid']);
}
?>
<?php $classproduct= new ClassProduct() ?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $UpdateProduct= $classproduct->ProductUpdate($_POST, $_FILES, $id);
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2>Update Product</h2>
                            <?php
                            if(isset($UpdateProduct)){
                                echo $UpdateProduct;
                            }
                            ?>
                            <?php
                            $GetProduct= $classproduct->GetProductById($id);
                            if($GetProduct){
                                while ($value= $GetProduct->fetch_assoc()){
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Product Name:</td>
                                        <td><input type="text" name="ProductName" value="<?php echo $value['ProductName'] ?>"/></td>
                                    </tr>
                                    <tr>
                                    <td>Category:</td>
                                        <td>
                                            <select name="CatId">
                                                <option>Select Category</option>
                                                <?php
                                                $cat= new ClassCategory;
                                                $GetCate= $cat->GetAllCat();
                                                if($GetCate){
                                                    while($result= $GetCate->fetch_assoc()){
                                                ?>
                                                <option 
                                                    <?php
                                                    if($value['CatId'] == $result['CatId']){
                                                        ?>
                                                        selected= "selected"
                                                    <?php
                                                    }
                                                    ?>
                                                    value="<?php echo $result['CatId'] ?>"><?php echo $result['CatName'] ?></option>
                                                <?php }
                                                } ?> 
                                            </select>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td>Brand:</td>
                                        <td>
                                            <select name="BrandId">
                                                <option value="">Select Brand</option>
                                                <?php
                                                $brand= new ClassBrand();
                                                $GetBrand= $brand->GetAllBrand();
                                                if($GetBrand){
                                                    while($result= $GetBrand->fetch_assoc()){
                                                ?>
                                               <option 
                                                    <?php
                                                    if($value['BrandId'] == $result['BrandId']){
                                                        ?>
                                                        selected= "selected"
                                                    <?php
                                                    }
                                                    ?>
                                                    value="<?php echo $result['BrandId'] ?>"><?php echo $result['BrandName'] ?></option>
                                                <?php } } ?>
                                            </select>
                                        </td>
                                        </tr>
                                    <tr>
                                        <td>Descreption:</td>
                                        <td>
                                            <textarea name="editor1" >
                                                <?php echo $value['Body'] ?>
                                            </textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Product type:</td>
                                        <td>
                                            <select name="Type">
                                                <?php
                                                if($value['type'] == 1){ ?>
                                                 <option selected= "selected" value="1">Featured</option>
                                                <option value="2">General</option>
                                                <?php } else{
                                                ?>
                                                <option value="1">Featured</option>
                                                <option selected= "selected" value="2">General</option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price:</td>
                                        <td><input type="text" name="Price" value="<?php echo $value['Price'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Upload Image</td>
                                        <td>
                                            <img src="<?php echo $value['Image']; ?>" hight="80px" width="200px"/><br/>
                                            <input type="file" name="image"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Update"></td>
                                    </tr>
                                </table>
                            </form>
                            <?php }
                            } ?>
                            </div>
                      </div>   
                    </article>
                </section>
                <?php include './inc/footerpart.php'; ?>