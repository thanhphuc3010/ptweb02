<?php
    require_once '../config/dbconnect.php';
    $keySearch = $_POST['keySearch'];
    $sql = "SELECT * FROM suppliers WHERE supplierNumber LIKE '%$keySearch%' ";
    $query = mysqli_query($connect,$sql);
    $num = mysqli_num_rows($query);
?>

<?php 
    if($num > 0) {
        while($row_sup = mysqli_fetch_assoc($query)) {?>
            <li class="supplier-items">
                <?php echo $row_sup['supplierId'] ." - ".$row_sup['supplierNumber'];?>
                <input type="hidden" class="supplierName" value="<?php echo $row_sup['supplierName'];?>">
                <input type="hidden" class="sup-id" value="<?php echo $row_sup['supplierId'];?>">
                <input type="hidden" class="sup-phone" value="<?php echo $row_sup['phone'];?>">
                <input type="hidden" class="sup-email" value="<?php echo $row_sup['email'];?>">
                <input type="hidden" class="sup-address" value="<?php echo $row_sup['address'];?>">
                <input type="hidden" class="sup-city" value="<?php echo $row_sup['city'];?>">
                <input type="hidden" class="sup-county" value="<?php echo $row_sup['county'];?>">
            </li>
        <?php
        }
    } else { ?>
        <li class="supplier-items" style="color:red;">Không tìm thấy bản ghi hợp lệ</li>
<?php
    } 
?>
