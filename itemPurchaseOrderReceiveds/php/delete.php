<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM itemspurchaseorderreceiveds WHERE itemNo = '$id'";
    $query = mysqli_query($connect, $sql);
    header('location: index.php?page_layout=list');
?>