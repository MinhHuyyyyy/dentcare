<?php
include "header.php";
include "slider.php";
include "class/category_class.php";

$category = new category;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['category_name'])) {
        $category_name = $_POST['category_name'];
        $insert_category = $category->insert_category($category_name);
    } else {
        echo "Tên danh mục không tồn tại.";
    }
}
?>
        <div class="admin-content-right">
            <div class="admin-content-right-category-add">
                <h2>Thêm danh mục</h2>
                <form action="" method="POST">
                    <input type="text" name="category_name" placeholder="Nhập tên danh mục"> <!-- Thêm thuộc tính name="category_name" -->
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
