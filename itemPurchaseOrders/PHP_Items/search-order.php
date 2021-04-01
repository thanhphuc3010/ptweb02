<?php
    require_once '../config/dbconnect.php';
    $key = $_POST['data'];
    $sql = "SELECT * FROM itempurchaseorders WHERE poNumber LIKE '%$key%' OR staffId LIKE '%$key%' OR remark LIKE '%$key%' ";
    $query = mysqli_query($connect,$sql);
    $num = mysqli_num_rows($query);
    if ($num != 0) {
    while ($row = mysqli_fetch_assoc($query)) { ?>
        <tr class="table__content">
            <td class="orders--Date"><?php echo $row['orderDate']; ?> </td>
            <td class="orders--poNumber"><?php echo $row['poNumber']; ?></td>
            <td class="orders--staffId"><?php echo $row['staffId']; ?> </td>
            <td class="orders--supplierId"><?php echo $row['supplierId']; ?></td>
            <td>
                <p class="orders__description">
                <?php echo $row['remark']; ?>
                </p>
            </td>
            <td class="status-check">
                <div class="btn-style orders--status"><?php echo $row['status']; ?></div>
            </td>
            <td>
                <div class="btn-style orders--billingStatus"><?php echo $row['billingStatus']; ?></div>
            </td>
            <td>
                <div class="btn">
                    <div class="btn__view">
                        <a href="index.php?page_layout=view&id=<?php echo $row['poNumber'];?>" class="btn__link">
                            <i class="btn_icon far fa-eye"></i>
                        </a>
                    </div>
                    <div class="btn__edit">
                        <a onclick="Del('<?php echo $row['poNumber'];?>','<?php echo $row['status'];?>')" class="btn__link">
                            <i class="btn_icon fas fa-pencil-alt"></i>
                        </a>
                    </div>
                    <div class="btn__delete">
                        <a onclick="return Del('<?php echo $row['poNumber'];?>','<?php echo $row['status'];?>')" href="index.php?page_layout=delete&id=<?php echo $row['poId'];?>" class="btn__link">
                            <i class="btn_icon far fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
    <?php
        }
    } else 
    echo '<p>Không tìm thấy bản ghi hợp lệ</p>';
    ?>
