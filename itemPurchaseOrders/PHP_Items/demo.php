<?php
     require_once('../config/dbconnect.php');
    $sql = "SELECT `poId`,`poNumber`,`supplierId`,`staffId`, `remark`, `status`, `billingStatus` FROM `itempurchaseorders` ";
    $query = mysqli_query($connect,$sql);

    $row = mysqli_fetch_row($query);
    echo "<pre>";
    print_r($row);
    echo "</pre>";

    $row1 = mysqli_fetch_assoc($query);

    echo "<pre>";
    print_r($row1);
    echo "</pre>";


?>



