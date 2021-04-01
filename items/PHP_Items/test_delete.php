<?php
    require_once '../config/dbconnect.php';
    $sql = "DELETE FROM items WHERE itemNo ='ITEM00090'";
    $query = mysqli_query($connect, $sql);
?>