<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>
<?php
$product = new product;
$show_product = $product -> show_product();
?>
<div class="admin-content-right">
<div class="admin-content-right-category-list">
                <h1>Danh danh sách loại sản phẩm</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Danh muc</th>
                        <th>Gia san pham</th>
                        <th>Gia khuyen mai</th>
                        <th>Mo ta</th>
                        <th>Anh san pham</th>
                        <th>Sua | xoa</th>
                    </tr>
                    <?php
                        if($show_product){$i = 0;
                            while($result = $show_product->fetch_assoc()){$i++;

                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['product_id'] ?></td>
                        <td><?php echo $result['product_name'] ?></td>
                        <td><?php echo $result['product_price'] ?></td>
                        <td><?php echo $result['product_price_new'] ?></td>
                        <td><?php echo $result['product_desc'] ?></td>
                        <td><img style="height: 100px; width:80px" src="uploads/<?php echo $result['product_img'] ?>" alt=""></td>
                    
                        <td><a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">Sua</a>|<a href="productdelete.php?product_id=<?php echo $result['product_id'] ?>">Xoa</a></td>
                    </tr>
                    <?php
                            }
                        }
                    ?>
                </table>
            </div>
</div>
</section>
</body>
</html>
