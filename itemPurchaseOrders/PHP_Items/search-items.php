<?php
    require_once '../config/dbconnect.php';
    $name = $_POST['idd'];
    $sql = "SELECT * FROM Items WHERE itemName LIKE '%$name%'";
    $query = mysqli_query($connect,$sql);
?>

<?php 
while($row_items = mysqli_fetch_assoc($query)) { ?>
    <li class="dropdown-items"><?php echo $row_items['itemName'];?><input class="id-products" type="hidden" value = <?php echo $row_items['itemNo'];?>></li>
<?php
}
?>



