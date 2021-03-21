<?php
    $ketnoi['host']='localhost';
    $ketnoi['dbname']='u116687685_ptweb02';
    $ketnoi['username']='root';
    $ketnoi['password']='';
	$conn = mysqli_connect($ketnoi['host'],$ketnoi['username'], $ketnoi['password'], $ketnoi['dbname']);
    mysqli_set_charset($conn,'utf8');
	if(!$conn){
		die("kết nối cơ sở dữ liệu không thành công!");
	}
?>

<?php
function autoNumber($string) {

$newstring = substr($string,4);
$convert = intval($newstring);
$convert += 1;

$num = 6;
if ($convert < 10) {
    $finalstring = "MAKE".str_repeat('0',($num-1)).$convert;
}
    else if ($convert < 100) {
        $finalstring = "MAKE".str_repeat('0',($num-2)).$convert;
}   else if ($convert < 1000) {
    $finalstring = "MAKE".str_repeat('0',($num-3)).$convert;
}   else if ($convert < 1000) {
    $finalstring = "MAKE".str_repeat('0',($num-4)).$convert;
}   else if ($convert < 10000) {
    $finalstring = "MAKE".str_repeat('0',($num-5)).$convert;
}   else if ($convert < 100000) {
    $finalstring = "MAKE".str_repeat('0',($num-6)).$convert;
}
return $finalstring;
}
?>
<?php
    function insertToDB($aryData){
        global $conn;
        $sql = "INSERT INTO itempurchaseorderreceiveds (" . implode(", ", array_keys($aryData)) . ") VALUES ('" . implode("', '", array_values($aryData)) . "')";
        return $conn->query($sql);
    }
?>
