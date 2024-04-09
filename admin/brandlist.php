<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>
<?php
$brand = new brand;
$show_brand = $brand -> show_brand();
?>
<div class="admin-content-right">
<div class="admin-content-right-category-list">
                <h1>Danh danh sách loại sản phẩm</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Danh muc</th>
                        <th>Loai san pham</th>
                        <th>Sua | xoa</th>
                    </tr>
                    <?php
                        if($show_brand){$i = 0;
                            while($result = $show_brand->fetch_assoc()){$i++;

                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['brand_id'] ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td><?php echo $result['brand_name'] ?></td>
                        <td><a href="brandedit.php?brand_id=<?php echo $result['brand_id'] ?>">Sua</a>|<a href="branddelete.php?brand_id=<?php echo $result['brand_id'] ?>">Xoa</a></td>
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
