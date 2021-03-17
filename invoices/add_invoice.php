<?php
    $connect = @mysqli_connect("localhost","root","giang123456");
    $DBSelect = @mysqli_select_db($connect,"ptweb002"); 
    $id = $_POST['id'];
    $sql_items = "SELECT * FROM Items WHERE itemNo = '$id'";
    $query_items = mysqli_query($connect,$sql_items);
?>
<?php
if(isset($_POST['submit'])) {

    $invoiceId = $_POST['invoiceId'];
    $invoiceDate = $_POST['invoiceDate'];
    $custId= $_POST['custId'];
    $subTotal = $_POST['subTotal'];
    $discount = $_POST['discount'];
    $discountPercent = $_POST['discountPercent'];
    $tax = $_POST['tax'];
    $amountDue = $_POST['amountDue'];
    $notes = $_POST['notes'];
    $status = $_POST['status'];
    $reservedDate = $_POST['reservedDate'];
    $soldDate = $_POST['soldDate'];
    $createdBy = $_POST['createdBy'];
    $soldBy = $_POST['soldBy'];
    $returnFrom = $_POST['returnFrom'];
    $title = $_POST['title'];
    $discountByPercentage = $_POST['discountByPercentage'];
    $created_date = $_POST['created_date'];
    $updated_date = $_POST['updated_date'];

     $sql = "UPDATE invoices SET invoiceId='$invoiceId', invoiceDate='$invoiceDate', custId='$custId', subTotal='$subTotal', discount='$discount', discountPercent=$discountPercent, tax='$tax', amountDue ='$amountDue', notes=$notes, status=$status, reservedDate=$reservedDate, soldDate=$soldDate,createdBy=$createdBy, soldBy = $soldBy, returnFrom=$returnFrom, title=$title,  discountByPercentage=$discountByPercentage, created_date=NOW(), updated_date=NOW() WHERE invoiceId ='$id'";

        $query = mysqli_query($connect,$sql);
        header('location: ../index.php?page_layout=list');
}
?>
<!
DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Dashboard invoices</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/png"/>
    <link rel="stylesheet"  type="text/css" href="../assets/css/grid.css"/>
    <link rel="stylesheet"  type="text/css" href="../assets/css/base.css"/>
    <link rel="stylesheet"  type="text/css" href="../assets/css/style.css?ver=1.1.1"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".search-products").keyup(function() {
            var txt = $(".search-products").val();
            if(txt != "") {
                $(".dropdown").fadeIn();
                $.post("./PHP_Items/search-items.php", {idd: txt}, function(data) {
                $(".dropdown-list").html(data);
                });
            } else {
                $(".dropdown-list").html("");
                $(".dropdown").fadeOut();
            }
        });
        
        $(document).on("click",".dropdown-items",function() {
                var mess = $(".id-products").val()
                $.post("./PHP_Items/add-items-to-order.php", {id: mess}, function (data) {
                    $(".data_content").append(data);
                });
                $(".dropdown").fadeOut();
        });

        $("#supplierName").keyup(function() {
            var spName = $("#supplierName").val();
            $.post("./PHP_Items/find-sup.php",{spName:spName},function() {

            });
        });
    });
</script>
<div class="wrapper">
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
                                <a id ="btn_lang" class="language__link"href="#">
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
                                    <a href="#" class="dropbox__link" >
                                        <img href="../assets/img/vietnam_flag.png" alt="vietnam flag">
                                        Vietnamese
                                    </a>
                                </li>
                                <li class="dropbox__invoices">
                                    <a class="dropbox__link" href="#">
                                        <img href="../assets/img/england_flag.png" alt="england flag">
                                       English
                                    /a>
                              </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="main">
        <div class="grid wide-invoice">
            <div class="row">
                <div class="col l-9">
                    <div class="row">
                        <div class="col l-12 search">
                            <div class="form-group">
                                <input class="search-products" type="text" name="location">
                                <label>Thêm sản phẩm vào hóa đơn</label>
                            </div>
                            <div class="dropdown">
                                <ul class="dropdown-list">
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- Table -->
                        <div class="table-invoice">
                            <div class="invoice">
                                <table class="content-table-invoice">
                                    <thead class="data__title">
                                        <tr id = "data-title" class="table__title">
                                            <th class="col_1-2" style="text-align:left;" >Mã sản phẩm</th>
                                            <th class="col_2">Tên sản phẩm</th>
                                            <th class="">Số lượng </th>
                                            <th class="">Đơn giá</th>
                                            <th class="col_1-2" style="text-align: right;">Thành tiền</th>
                                            <th class="col_2">Ghi chú</th>
                                            <th class="">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="data_title">
                                        <?php
                                                            $connect = @mysqli_connect("localhost","root","giang123456");
                                                            $DBSelect = @mysqli_select_db($connect,"ptweb002"); 
                                                            $sql_items = "SELECT `itemNo`,`itemName`,`quantity`, `price`,`amount`, `notes` FROM `items`JOIN'invoiceitems'ON items.itemNo=invoiceitems.itemNo ";
                                                            $query_items = mysqli_query($connect,$sql_items);
                                                        ?>
                                        
                                                        <?php
                                                            while($row = mysqli_fetch_row($query_items)){?>
                                                                <tr class="table__content">
                                                                    <td data-label="Mã sản phẩm" class=""><?php echo $row[0]; ?> </td>
                                                                    <td data-label="Tên sản phẩm"><?php echo $row[1]; ?> </td>
                                                                    <td data-label="Số lượng" class="items__quantity"><?php echo $row[2]; ?></td>
                                                                    <td data-label="Đơn giá" class="items__price"><?php echo number_format($row[3]); ?></td>
                                                                    <td data-label="Thành tiền" class="items__amount"><?php echo $row[4]; ?></td>
                                                                    <td data-label="Ghi chú">
                                                                        <p class="notes">
                                                                        <?php echo $row[5]; ?>
                                                                        </p>
                                                                    </td>
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
                <div class="col l-3">
                     <div class="row">
                        <?php
                            $connect = @mysqli_connect("localhost","root","giang123456");
                            $DBSelect = @mysqli_select_db($connect,"ptweb002"); 
                            $sql_invoice = "SELECT `invoiceId`,`title`,`invoiceDate`, `reservedDate`,`soldDate`, `custId`,`soldBy`,`status`,`notes` FROM `invoices`";
                            $query = mysqli_query($connect,$sql_invoice);
                        ?>
                        
                        <div class="col l-12">
                                <div class="form-group">
                                    <input id="invoiceId" type="text" name="invoiceId" required>
                                    <label>Mã hóa đơn</label>
                                </div>
                            </div>
                            <div class="col l-12">
                                <div class="form-group">
                                    <input id="title" type="text" name="title" required>
                                    <label>Tên hóa đơn</label>
                                </div>
                            </div>
                            <div class="col l-12">
                            <div class="form-group">
                                <input class="datetime"id="invoiceDate" placeholder="Hôm nay"  name="invoiceDate" required>
                                <label>Ngày hóa đơn</label>
                            </div>
                            </div>
                            <div class="col l-12">
                            <div class="form-group">
                                <input class="datetime"id="reservedDate"  name="reservedDate" required>
                                <label>Ngày đặt hàng</label>
                            </div>
                            </div>
                            <div class="col l-12">
                            <div class="form-group">
                                <input class="datetime"id="soldDate"   name="soldDate" required>
                                <label>Ngày hoàn thành hóa đơn</label>
                            </div>
                            </div>
                            <div class="col l-12">
                            <div class="form-group">
                                <input id="custId" type="text" name="custId" required>
                                <label>Mã khách hàng</label>
                            </div>
                            </div>
                            <div class="col l-12">
                            <div class="form-group">
                                <input id="soldBy" type="text" name="soldBy" required>
                                <label>Mã người hoàn thành hóa đơn</label>
                            </div>
                            </div>

                        
                        <div class="col l-12">
                            <label style="font-size:var(--medium-font-size);padding-bottom:5px;">Trạng thái </label>
                            <div class="status" id="status-list">
                                <div class="status-select">
                                    <span class="status-selected">Choose</span>
                                    <i class="fa fa-angle-down status-caret"></i>
                                </div>
                                <ul class="status-list">
                                    <li class="status-invoice" data-value="Pending">
                                    Pending
                                    </li>
                                    <li class="status-invoice" data-value="Open">
                                    Quote
                                    </li>
                                    <li class="status-invoice" data-value="Done">
                                    Reserved
                                    </li>
                                    <li class="status-invoice" data-value="Done">
                                    Sold
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col l-12">
                                <div class="form-group">
                                    <input id="notes" type="text" name="notes" required>
                                    <label>Ghi chú</label>
                                </div>
                            </div>
                        
                         <!-- Thành tiền + Orders Button -->
                         
                     </div>              
                </div>
            
                
            </div>
                <div class="row">
                    <div class="col l-12">
                     <div class="col l-12">
                            <div id="chitiet-hoadon" class="row">
                                <div class="col l-3-2">
                                    <div class="form-group">
                                        <input type="text" name="Subtotal">
                                        <label>Tổng tiền trước thuế</label>
                                    </div>
                                </div>
                                <div class="col l-3">
                                    <div class="form-group">
                                        <input type="text" name="discount">
                                        <label>Số tiền chiết khấu/GG</label>
                                    </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="tax">
                                    <label>Số tiền thuế</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="discountpercent">
                                    <label>Phần trăm chiết khấu/GG</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-3">
                    <div class="row">
                        <div class="col l-12-1">
                            <div class="form-group">
                                <input type="text" name="amount">
                                <label>Thành tiền</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="btn_add">
                                    <button class = "form__button" type="submit" name="submit">Tạo hóa đơn</button>
                                </div>
                            <div class="btn_return">
                                    <div class="backtolist">
                                        <a href="./index.php?page_layout=list"> Quay lại </a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>                       
            </div>
        </div>
    </div>
</div>