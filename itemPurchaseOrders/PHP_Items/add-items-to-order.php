<?php
    require_once '../config/dbconnect.php';
    $id = $_POST['id'];
    $sql_items = "SELECT * FROM Items WHERE itemNo = '$id'";
    $query_items = mysqli_query($connect,$sql_items);
?>

<?php 
while($row_add = mysqli_fetch_assoc($query_items)) { ?>
    <tr items-id="<?php echo $row_add['itemNo']; ?>" class="table__content">
        <td class="itemNo"><?php echo $row_add['itemNo'];?></td>
        <td class="items__img" style="text-align:justify;"><?php echo $row_add['itemName'];?></td>
        <td class="orders-input">
            <input name="qty" class="quantity" class="input-data" type="text" min="1" value="1">
        </td>
        <td class="orders-input">
            <input name="cost" class="cost" type="text" min="1" value="1">
        </td>
        <td class="orders-input" id = "orders-amount" style="text-align: right;">
            <input name="amount" class="amount" type="text">
        </td>
        <td class="orders-input" >
            <input type="text" style="width:100%;text-align: left;">
        </td>
        <td>
            <div class="btn btn-order-add">
                <div class="btn__delete">
                    <a href="#" id="btn-delete" class="btn__link">
                        <i class="btn_icon far fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        </td>
    </tr>
<?php
}
?>