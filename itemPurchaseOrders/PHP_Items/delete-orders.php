<?php
    $id = $_GET['id'];
    $sql_check = "SELECT * FROM itempurchaseorders WHERE poId = '$id' AND status = 'DONE'";
    $query_check = mysqli_query($connect, $sql_check);
    $count = mysqli_num_rows($query_check);
    if($count == 0){
    $sql = "DELETE FROM itempurchaseorders WHERE poId = '$id'";
    $query = mysqli_query($connect, $sql);

    $sql_detail = "DELETE FROM itempurchaseorderdetails WHERE poId = '$id'";
    $query_detail = mysqli_query($connect, $sql_detail);
    } else {

    }
    mysqli_close($connect);
    header('location: index.php?page_layout=list');
?>