<?php
    require_once '../config/dbconnect.php';
    $id = $_POST['id'];
    $sql_items = "SELECT * FROM Items WHERE itemNo = '$id'";
    $query_items = mysqli_query($connect,$sql_items);
?>

<?php 
while($row_add = mysqli_fetch_assoc($query_items)) { ?>
    <tr class="table__content">
        <td class=""><?php echo $row_add['itemNo'];?> </td>
        <td class="items__img"><?php echo $row_add['itemName'];?></td>
        <td class="orders-input">
            <input type="number" min="1" value="1">
        </td>
        <td class="orders-input">
            <input type="number" min="1" value="1">
        </td>
        <td class="orders-input" id = "orders-amount" style="text-align: right;">
            <input type="text">
        </td>
        <td class="orders-input" >
            <input type="text" style="width:100%;text-align: left;">
        </td>
        <td>
            <div class="btn">
                <div class="btn__edit">
                    <a href="#" class="btn__link">
                        <i class="btn_icon fas fa-pencil-alt"></i>
                    </a>
                </div>
                <div class="btn__delete">
                    <a href="#" class="btn__link">
                        <i class="btn_icon far fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        </td>
    </tr>
<?php
}
?>