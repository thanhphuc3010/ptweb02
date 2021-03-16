
<?php
$string = "INSERT INTO `itempurchaseorderdetails` (`poLineId`, `poId`, `itemNo`, `qty`, `qtyReceived`, `cost`, `amount`, `note`) VALUES ('1', '18', 'ITEM00006', '50', '0', '4000', '200000', 'Chưa nhận hàng'), ('2', '18', 'ITEM00030', '100', '0', '6000', '600000', 'Chưa nhận hàng'),";
$sql_insert =  substr($string, 0, -1);

echo $sql_insert;
?>