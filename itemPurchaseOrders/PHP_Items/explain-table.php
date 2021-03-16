<?php
    require_once '../config/dbconnect.php';
   
    $query = mysqli_query($connect,"DESCRIBE itemPurchaseOrders");
        // echo '<pre>';
        // print_r($query);
        // echo '</pre>';

    while($row = mysqli_fetch_array($query)) {
        echo '<pre>';
        print_r($row);
        echo '</pre>';
    }
?>