<?php
    // Database connection
    $connect = @mysqli_connect("localhost","root","Thanhphuc3010@");
    if($connect) {
    }
    else echo 'Kết nối thất bại';
    $DBSelect = @mysqli_select_db($connect,"ptweb02"); 
?>