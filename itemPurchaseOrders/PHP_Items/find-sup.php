<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    require_once '../config/dbconnect.php';

    $data = $_POST['orders'];
    
    $poNumber = $data['poNumber'];
    $orderDate = $data['orderDate'];
    $receiveDate = $data['receiveDate'];
    $status = $data['status'];
    $staffId = $data['staffId'];
    $paymentTermId = $data['paymentTermId'];
    $supplierId = $data['supplierId'];
    $billingStatus = $data['billingStatus'];

    $totalAmount = $data['totalAmount'];
    $orderRemark = $data['orderRemark'];
    $detail_order = $data['detailorder'];

    // var_dump($detail_order);

    $sql = "INSERT INTO `itempurchaseorders`(`orderDate`, `poNumber`, `supplierId`, `remark`, `paymentTermId`, `staffId`, `status`, `receiveDate`, `totalAmount`, `billingStatus`) VALUES('$orderDate','$poNumber', '$supplierId', '$orderRemark', '$paymentTermId', '$staffId', '$status', '$receiveDate', '$totalAmount', '$billingStatus')";
    $query = mysqli_query($connect,$sql);
    
    if($query) {
        echo "Tạo đơn hàng thành công";
    } else {
        echo 'Fail to add orders';
    }

    
    $last_id = $connect->insert_id;
    // var_dump($last_id);


    // "INSERT INTO `itempurchaseorderdetails` (`poLineId`, `poId`, `itemNo`, `qty`, `qtyReceived`, `cost`, `amount`, `note`, `created_date`, `updated_date`) VALUES ('1', '17', 'ITEM00006', '50', '0', '4000', '200000', 'Chưa nhận hàng'), ('2', '17', 'ITEM00030', '100', '0', '6000', '600000', 'Chưa nhận hàng',)";
    // $items= $detail_order[0];
    // print_r($items);

    $sql_insert = "INSERT INTO `itempurchaseorderdetails` (`poLineId`, `poId`, `itemNo`, `qty`, `qtyReceived`, `cost`, `amount`, `note`) VALUES" ;

    $string_order = "";
    foreach($detail_order as $key => $values){

        $string_order .= "(null, $last_id, '{$values['id']}', {$values['quantity']}, 0, {$values['cost']}, {$values['amount']}, 'Chưa nhận hàng'),";
    }

    $sql_insert = $sql_insert.$string_order;
    $sql_insert = substr($sql_insert, 0, -1);
    echo $sql_insert;
    $add_detail = mysqli_query($connect,$sql_insert);

    if ($add_detail) {
        echo "Add thành công";
    } else {
        echo "Thất bại";
    }
    ?>