<?php include './inc/headerpart.php' ?>
<?php include './inc/sidebarpart.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassCategory.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassBrand.php'; ?>
<?php include dirname(dirname(__DIR__)) . '/classes/ClassProduct.php'; ?>
<?php $classproduct= new ClassProduct() ?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $InsertProduct= $classproduct->ProductInsert($_POST, $_FILES);
}
?>
                    <article class="maincontent clear">
                        <div class="content">
                            <div class="addarticle clear">
                            <h2>Add Product</h2>
                            <?php
                            if(isset($InsertProduct)){
                                echo $InsertProduct;
                            }
                            ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <table>
                                    <tr>
                                        <td>Product Name:</td>
                                        <td><input type="text" name="ProductName" placeholder="Plaese Enter a title"/></td>
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
                                                <option value="<?php echo $result['CatId'] ?>"><?php echo $result['CatName'] ?></option>
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
                                                <option value="<?php echo $result['BrandId'] ?>"><?php echo $result['BrandName'] ?></option>
                                                <?php } } ?>
                                            </select>
                                        </td>
                                        </tr>
                                    <tr>
                                        <td>Descreption:</td>
                                        <td>
                                        <textarea name="editor1" ></textarea>
		<script>CKEDITOR.replace( 'editor1' );</script>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Product type:</td>
                                        <td>
                                            <select name="Type">
                                                <option value="1">Featured</option>
                                                <option value="2">General</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Price:</td>
                                        <td><input type="text" name="Price" placeholder="Enter product price"></td>
                                    </tr>
                                    <tr>
                                        <td>Upload Image</td>
                                        <td><input type="file" name="image"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="submit" name="submit" value="Submit"></td>
                                    </tr>
                                </table>
                            </form>
                            </div>
                      </div>   
                    </article>
                </section>
                <?php include './inc/footerpart.php'; ?>