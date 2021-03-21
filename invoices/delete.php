<?php
    $id = $_GET['id'];
    $sql = "DELETE FROM invoices WHERE invoiceID = '$id'";
    $query = mysqli_query($connect, $sql);
    header('location: index.php?page_layout=list');
?>

