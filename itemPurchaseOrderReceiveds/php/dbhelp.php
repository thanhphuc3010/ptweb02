<?php
require_once('config.php');
/** 
 * insert,update,delete -> su dung function
*/
function execute($sql) {
    $conn =mysqli_connect(localhost,root,,u116687685_ptweb02);
    mysqli_query($conn,$sql);
    mysqli_close($conn);
}

function excuteResult($sql){
    $conn =mysqli_connect(localhost,root,,u116687685_ptweb02);
   $resulset = mysqli_query($conn,$sql);
   $list     =[];
   while ($row = mysqli_fetch_array($resultset,1))
    {$list[]= $row;}
   mysqli_close($conn);
   return $list;
}
?>