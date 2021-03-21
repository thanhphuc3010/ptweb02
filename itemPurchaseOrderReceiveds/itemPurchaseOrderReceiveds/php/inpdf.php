<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In danh sách</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
  .col_1 {
    width: 5%;
}
.col-2{
    width:20%;
}
  </style>
</head>
<body onload="window.print()">
<?php require_once('config.php');?>
<?php
    $sql= "SELECT *FROM `itempurchaseorderreceiveds`  join `itempurchaseorderdetails` ON itempurchaseorderreceiveds.poLineId= itempurchaseorderdetails.poLineId";
    $query=mysqli_query($conn,$sql) ; 
     while ( $row= mysqli_fetch_assoc($query)){
         $data[]=$row;
     }
     ?>
      <table class="table-bordered text-center">
                            <thead class="data__title">
                                <tr class="table__title">
                                    <th class="col_1">Mã đơn </th>
                                    <th class="col_1">Mã đơn hàng</th>
                                    <th class="col_1">Ngày nhận</th>
                                    <th class="col_1">Số lượng nhận</th>
                                    <th class="col_1">Tổng tiền nhận</th>
                                    <th class="col_1 ">Số lượng bán</th>
                                    <th class="col_1">Tiền vốn bán</th>
                                    <th class="col_2" style="text-align: center">Ghi chú</th>
                                </tr>
                            </thead>
                            <tbody class="data_content">
                                <?php
                                   foreach($data as $data){?>
                                        <tr class="table__title">
                                        <td class="col_1"><?php echo $data['lotId'];?> </td>
                                        <td class="col_1"><?php echo $data['poLineId'];?> </td>
                                        <td class="col_1"><?php echo $data['receiveDate'];?> </td>
                                        <td class="col_1"><?php echo $data['qtyReceived'];?> </td>
                                        <td class="col_1"><?php echo $data['qtyReceived']* $data['cost'];?> </td>
                                        <td class="col_1"><?php echo $data['qtySold'];?> </td>
                                        <td class="col_1"><?php echo $data['amountSold'];?> </td>
                                        <td class="col_2" style="text-align: center"><?php echo $data ['note'];?></td>
                                       
                                        </tr>
                                   <?php }
                                ?>
                                 <!-- <tr class="table__content">
                                    <td class="">ORD2022</td>
                                    <td class="">ORD2021</td>
                                    <td class="date_received">06/03/2021</td>
                                    <td class="qty_received">12000</td>
                                    <td class="amount_received">7500000</td>
                                    <td class="qty_sold">20</td>
                                    <td class="amount_sold">40</td>
                                    <td class="note">rdtu000</td>
                                    <td> -->
                                        
                                    </td> 
                                </tr> 
                            </tbody>
                        </table>
</body>
</html>