<?php
    // Database connection
    $connect = @mysqli_connect("localhost","root","");  
    if($connect) {
    }
    else echo 'Kết nối thất bại';
    $DBSelect = @mysqli_select_db($connect,"ptweb02");
    if($DBSelect) {
        echo "Success";
    } else echo "Fail";
?>