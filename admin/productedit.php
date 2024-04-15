<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
$product_id = $_GET['product_id'];
$get_product = $product -> get_product($product_id);
if($get_product){
    $resultB = $get_product -> fetch_assoc();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$category_id = $_POST['category_id'];
$product_name = $_POST['product_name'];
$update_product = $product -> update_product($category_id,$product_name,$product_id);
    } 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $insert_product = $product -> insert_product($_POST,$_FILES);
}
?>

        <div class="admin-content-right">
            <div class="admin-content-right-product-add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color: red;">*</span></label>
                    <input name="product_name" required type="text" value="<?php echo $resultB['product_name'] ?>" >
                    <label for="">Chọn danh mục <span style="color: red;">*</span></label>
                    <select name="category_id" id="category_id" >
                        <option value="#">--Chọn--</option>
                        <?php
                        $show_category = $product -> show_category();
                        if($show_category) {while($result = $show_category -> fetch_assoc()){

                        ?>
                        <option value="<?php echo $result['category_id'] ?>"><?php echo $result['category_name'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <label for="">Chọn sản phẩm <span style="color: red;">*</span></label>
                    <select name="brand_id" id="brand_id">
                        <label for="">Chọn loại sản phẩm <span style="color: red;">*</span></label>
                        <option value="#">--Chọn--</option>
                        <?php
                        $show_brand = $product -> show_brand();
                        if($show_brand) {while($result = $show_brand -> fetch_assoc()){

                        ?>
                        <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                        <?php
                        }}
                        ?>
                    </select>
                    <label for="">Giá sản phẩm<span style="color: red;">*</span></label>
                    <input name="product_price" required type="text" value="<?php echo $resultB['product_price'] ?>">
                    <label for="">Giá khuyến mãi<span style="color: red;">*</span></label>
                    <input name="product_price_new" required type="text" value="<?php echo $resultB['product_price_new'] ?>">
                    <label for="">Mô tả sản phẩm<span style="color: red;">*</span></label>
                    <textarea required name="product_desc" id="editor1" cols="30" rows="10" value="<?php echo $resultB['product_desc'] ?>"></textarea>
                    <script>CKEDITOR.replace( 'editor1' );</script>
                    <label for="">Ảnh sản phẩm<span style="color: red;">*</span></label>
                    <span style="color:red"><?php if (isset($insert_product)){
                        echo $insert_product;
                    } ?></span>
                    <input name="product_img" required type="file" >
                    <label for="">Ảnh mô tả<span style="color: red;">*</span></label>
                    <input name="product_img_desc[]" required multiple type="file">
                    <button type="submit">Sua</button>
                </form>
            </div>
        </div>
    </section>
</body>

<script>
    $(document).ready(function(){
        $("#category_id").change(function(){
            // alert($(this).val())
            var x = $(this).val()
            $.get("productadd_ajax.php",{category_id:x},function(data){
                $("#brand_id").html(data);
            })
        })
    })
</script>

</html>
