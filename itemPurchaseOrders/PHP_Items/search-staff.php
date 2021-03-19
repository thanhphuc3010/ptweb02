<?php
    require_once '../config/dbconnect.php';
    $keySearch = $_POST['keySearch'];
    $sql = "SELECT * FROM staffs WHERE staffId LIKE '%$keySearch%' OR fullname LIKE '%$keySearch%' ";
    $query = mysqli_query($connect,$sql);
    $num = mysqli_num_rows($query);
?>

<?php 
    if($num > 0) {
        while($row_items = mysqli_fetch_assoc($query)) { ?>
            <li class="staff-items"><?php echo $row_items['staffNumber']." - ".$row_items['fullname'];?><input type="hidden"  id="staff--id" value="<?php echo $row_items['staffId'] ?>"></li>
            
        <?php
        }
    } else { ?>
        <li class="staff-items" style="color:red;">Không tìm thấy bản ghi hợp lệ</li>
<?php
    } 
?>
