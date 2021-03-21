<?php require_once('config.php'); ?>
<?php
$where_search = "";
if (!empty($_GET["search"])) {
    $where_search = "WHERE `lotId` LIKE '%{$_GET["search"]}%' OR `itempurchaseorderdetails`.`poLineId` LIKE '%{$_GET["search"]}%'";
}
$sql = "SELECT `lotId`,`itempurchaseorderdetails`.`poLineId`,`receiveDate`,`itempurchaseorderreceiveds`.`qtyReceived` as `qtyReceiveda`,`amountReceived`,`qtySold`,`amountSold`,`itempurchaseorderreceiveds`.`note` as `notea`, `cost` FROM `itempurchaseorderreceiveds` JOIN `itempurchaseorderdetails` ON `itempurchaseorderreceiveds`.`poLineId` = `itempurchaseorderdetails`.`poLineId` {$where_search} ";
$query = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Received</title>
    <link rel="shortcut icon" href="./img/logo.png" type="image/png">
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/base.css">
    <link rel="stylesheet" href="./css/style/.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .col_1 {
            width: 5%;
        }

        th,
        td {
            border: 1px solid;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Lưới Grid -->
        <?php
        get_header();
        ?>
        <div class="app">
            <div class="grid">
                <div class="container">
                    <div class="items row">
                        <div class="items__infor col-md-6">
                            <h1 class="items__title">
                                Received list
                            </h1>
                            <p class="items__detail">
                                Đây là nơi bạn theo dõi thông tin đơn hàng và thực hiện các chức năng có liên quan.
                            </p>
                        </div>
                        <div class="btn__genernal col-md-6">
                            <div class="float-right">
                                <button onclick="window.location.href='index.php?page_layout=add';" class="btn btn-success items__add">
                                    <i class="fas fa-plus items__icon "></i>
                                    <p>Tạo mới</p>
                                </button>
                                <button onclick="window.location.href='index.php?page_layout=inpdf';" class="btn btn-info my-2 items__add">
                                    <i class="fas fa-download items__icon"></i>
                                    <p>In danh sách</p>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="content">
                        <table class="data ">
                            <thead class="data__title">
                                <tr class="table__title">
                                    <th class="col_1">Mã đơn </th>
                                    <th class="col_1">Mã đơn hàng</th>
                                    <th class="col_2">Ngày nhận</th>
                                    <th class="col_1">Số lượng nhận</th>
                                    <th class="col_1">Tổng tiền nhận</th>
                                    <th class="col_1 ">Số lượng bán</th>
                                    <th class="col_1">Tiền vốn bán</th>
                                    <th class="col_1" style="text-align: center">Ghi chú</th>
                                    <th class="col_1" style="text-align: center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="data_content">
                                <?php
                                foreach ($data as $data) { ?>
                                    <tr class="table__title">
                                        <td class="col_1"><?php echo $data['lotId']; ?> </td>
                                        <td class="col_1"><?php echo $data['poLineId']; ?> </td>
                                        <td class="col_1"><?php echo $data['receiveDate']; ?> </td>
                                        <td class="col_1"><?php echo $data['qtyReceiveda']; ?> </td>
                                        <td class="col_1"><?php echo $data['qtyReceiveda'] * $data['cost']; ?> </td>
                                        <td class="col_1"><?php echo $data['qtySold']; ?> </td>
                                        <td class="col_1"><?php echo $data['amountSold']; ?> </td>
                                        <td class="col_1" style="text-align: center"><?php echo $data['notea']; ?></td>
                                        <td class="">
                                            <div class="box-option d-flex flex-wrap justify-content-around">
                                                <a href="./index.php?page_layout=edit&lotId=<?php echo $data['lotId']; ?>" class="btn btn-info">
                                                    <i class="btn_icon fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="index.php?page_layout=delete&lotId=<?php echo $data['lotId']; ?>" data-lotID="<?php echo $data['lotId']; ?>" class="btn btn-danger btn-delete">
                                                    <i class="btn_icon far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul class="pagi">
                        <li class="pagi__item pagi__action pagi__prev is-disabled">
                            <i class="pagi__icon fal fa-angle-left"></i>
                        </li>
                        <li class="pagi__item is-active">1</li>
                        <li class="pagi__item">2</li>
                        <li class="pagi__item">3</li>
                        <li class="pagi__item">4</li>
                        <li class="pagi__item">5</li>
                        <li class="pagi__item pagi__action pagi__next">
                            <i class="pagi__icon fal fa-angle-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <script>
            document.getElementById("btn_lang").addEventListener("click", function() {
                var drbox = document.getElementById("dropbox");
                if (drbox.style.display == "block") {
                    drbox.style.display = "none";
                } else {
                    drbox.style.display = "block";
                }
            })


            $(".btn-delete").click(function() {
                let check = confirm("Bạn có chắc chắn muốn xoá sản phẩm: " + $(this).attr("data-lotID") + " không?");
                if (!check) {
                    return false;
                }
            })
        </script>
</body>

</html>