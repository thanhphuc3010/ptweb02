<?php
    $lotId = $_GET['lotId'];
    $sql = "DELETE FROM itempurchaseorderreceiveds WHERE lotId = '$lotId'";
    $query = mysqli_query($conn, $sql);
    header('location: ./index.php?page_layout=list');
?>