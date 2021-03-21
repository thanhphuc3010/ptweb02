<?php
    $connect = @mysqli_connect("localhost","root","giang123456");
    $DBSelect = @mysqli_select_db($connect,"ptweb002"); 
   $sql_invoice = "SELECT `invoiceId`,`title`,`invoiceDate`, `reservedDate`,`soldDate`, `custId`,`soldBy`,`status`,`notes`,`amountDue` FROM `invoices`";
    $query = mysqli_query($connect,$sql_invoice);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Dashboard invoices</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/png">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.0.2">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".search__input").keyup(function() {
                var txt = $(".search__input").val();
                $.post("./Php_invoice/search.php", {data: txt}, function(data) {
                    $(".data").html(data);
                });
            });
        });
    </script>
    <div class="wrapper">
        <!-- Header -->
        <header>
            <div class="grid">
                <div class="navbar">
                    <div class="search">
                        <form action="#" class="search__box">
                            <a class="search__link" href="#"><i class="fas fa-search search__icon"></i></a>
                            <input type="text" class="search__input" placeholder="Search here...">
                        </form>
                    </div>
                    <div class="account">
                        <ul class="account__list">
                            <li  class="account__invoices language">
                                <a id ="btn_lang" class="language__link" href="#">
                                    <img src="../assets/img/vietnam_flag.png" alt="vietnam flag">
                                    Vietnamese
                                </a>
                            </li>
                            <li class="account__invoices user__icon "><i class="far fa-envelope"></i></li>
                            <li class="account__invoices user__icon "><i class="far fa-bell"></i></li>
                            <li class="account__invoices">
                                <a href="#" class="account__link">
                                    <img class="account__img" src="../assets/img/user.png" alt="user">
                                </a>
                            </li>
                        </ul>
                        <!-- Drop_box_Language -->
                        <div id="dropbox" class="dropbox">
                            <ul class="dropbox__list">
                                <li class="dropbox__invoices">
                                    <a class="dropbox__link" href="#">
                                        <img src="../assets/img/vietnam_flag.png" alt="vietnam flag">
                                        Vietnamese
                                    </a>
                                </li>
                                <li class="dropbox__invoices">
                                    <a class="dropbox__link" href="#">
                                        <img src="../assets/img/england_flag.png" alt="england flag">
                                        English
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main -->
        <div class="app">
            <div class="grid">
                <div class="container">
                    <div class="invoices">
                        <div class="invoices__infor">
                            <h1 class="invoices__title">
                                Invoices List
                            </h1> <br/>
                            <p class="invoices__detail">
                                Đây là nơi bạn theo dõi thông tin các hóa đơn và thực hiện các chức năng có liên quan.
                            </p>
                        </div>
                        <br />
                        <div class="btn__genernal">
                            <button type="button" onclick="tao_moi()">Tạo mới</button>
                            <script>
                            function tao_moi(){
                                 location.assign("add_invoice.php");}
                             </script>
                            <button type="button" onclick="in()">In danh sách</button>
                            <script>
                            function in(){
                                 location.assign("print.php");}
                             </script>
                        </div> <br />
                    </div>

                    <div class="content">
                           <table class="content-table">
                            <thead class="data__title">
                                <tr class="table__title">
                                    <th data-label="Mã hóa đơn">Mã hóa đơn</th>
                                    <th data-label="Tên hóa đơn" class="col_2">Tên hóa đơn</th>
                                    <th data-label="Ngày hóa đơn" class="col_3">Ngày hóa đơn</th>
                                    <th data-label="Ngày đặt hàng" class="col_3">Ngày đặt hàng</th>
                                    <th data-label="Ngày hoàn thành">Ngày hoàn thành</th>
                                    <th data-label="Mã khách hàng">Mã khách hàng</th>
                                    <th data-label="Mã người hoàn thành">Mã người hoàn thành</th>
                                    <th data-label="Trạng thái">Trạng thái</th>
                                    <th data-label="Ghi chú" >Ghi chú</th>
                                    <th data-label="Số tiền phải thanh toán"class="label__price col_1">Số tiền phải thanh toán</th>
                                    <th data-label="Thao tác">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="data_content">
                            <?php
                                while($row = mysqli_fetch_row($query)){?>
                                    <tr class="table__content">
                                        <td data-label="Mã hóa đơn" class=""><?php echo $row[0]; ?> </td>
                                        <td data-label="Tên hóa đơn" ><?php echo $row[1]; ?> </td>
                                        <td data-label="Ngày hóa đơn" class="invoice_date"><?php echo $row[2]; ?> </td>
                                        <td data-label="Ngày đặt hàng" class="reserved_date"><?php echo $row[3]; ?> </td>
                                        <td data-label="Ngày hoàn thành" class="sold_date"><?php echo $row[4]; ?> </td>
                                        <td data-label="Mã khách hàng" class=""><?php echo $row[5]; ?> </td>
                                        <td data-label="Mã người hoàn thành" class=""><?php echo $row[6]; ?> </td>
                                        <td data-label="Trạng thái">
                                            <p class="invoice_status">
                                            <?php echo $row[7]; ?>
                                            </p>
                                        </td>
                                        <td data-label="Ghi chú">
                                            <p class="invoice_notes">
                                            <?php echo $row[8]; ?>
                                            </p>
                                        </td>
                                        <td data-label="Số tiền phải thanh toán" class="amount_due"><?php echo $row[9]; ?></td>
                                       
                                        <td data-label="Thao tác">
                                            <div class="btn">
                                                <div class="btn__view">
                                                    <a href="../index.php?page_layout=view&id=<?php echo $row[0];?>" class="btn__link">
                                                        <i class="btn_icon far fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="btn__edit">
                                                    <a href="edit_invoice.php<?php echo $row[0];?>" class="btn__link">
                                                        <i class="btn_icon fas fa-pencil-alt"></i>
                                                    </a>
                                                </div>
                                                <div class="btn__delete">
                                                    <a onclick="return Del('<?php echo $row[2];?>')" href="./index.php?page_layout=delete<?php echo $row[0];?>" class="btn__link">
                                                        <i class="btn_icon far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script >
        document.getElementById("btn_lang").addEventListener("click",function()
        {
            var drbox = document.getElementById("dropbox");
            if (drbox.style.display == "block")
            {
                drbox.style.display = "none";
            }
            else 
            {
                drbox.style.display = "block";
            }
        })


        function Del(name) {
            return confirm("Bạn có chắc chắn muốn xoá sản phẩm: " + name + " không?");
        }
    </script>
</body>
</html>