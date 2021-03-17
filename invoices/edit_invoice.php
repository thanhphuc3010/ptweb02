
<?php
    $connect = @mysqli_connect("localhost","root","giang123456");
    $id = $_GET['invoiceId'];
    $sql_up = "SELECT * FROM invoices WHERE invoiceId ='$id'";
    $query = mysqli_query($connect, $sql_up);
    $row = mysqli_fetch_assoc($query);

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
        header('location: ./index.php?page_layout=list');
    }
?>
<!DOCTYPE html>
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
<div class="wrapper">
    <!-- Lưới Grid -->
    <header>
        <div class="grid">
            <div class="navbar">
                <div class="search">
                    <form action="#" class="search__box">
                        <a class="search__link" href="#"><i class="fas fa-search search__icon"></i></a>
                        <input type="text" class="search__input" placeholder="Search here...">
                    </form>
                    <div class="search__mb">
                        <a class="search__link" href="#"><i class="fas fa-search search__icon"></i></a>
                    </div>
                </div>
                <div class="account">
                    <ul class="account__list">
                        <li  class="account__items language">
                            <a id ="btn_lang" class="language__link" href="#">
                                <img src="../assets/img/vietnam_flag.png" alt="vietnam flag">
                                Vi
                            </a>
                        </li>
                        <li class="account__items user__icon "><i class="far fa-envelope"></i></li>
                        <li class="account__items user__icon "><i class="far fa-bell"></i></li>
                        <li class="account__items">
                            <a href="#" class="account__link">
                                <img class="account__img" src="../assets/img/user.png" alt="user">
                            </a>
                        </li>
                    </ul>
                    <!-- Drop_box_Language -->
                    <div id="dropbox" class="dropbox">
                        <ul class="dropbox__list">
                            <li class="dropbox__items">
                                <a class="dropbox__link" href="#">
                                    <img src="../assets/img/vietnam_flag.png" alt="vietnam flag">
                                    Vietnamese
                                </a>
                            </li>
                            <li class="dropbox__items">
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
    
    <div class="main">
        <div class="grid wide-invoice">
            <div class="row">
                <div class="col l-9">
                    <div class="row">
                        <div class="col l-12 search">
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
                                    <tbody class="data_content">
                                        <tr class="table__content">
                                            <td data-label="itemNo">ITEM00001</td>
                                            <td data-label="itemName">Điện thoại Iphone 12 Pro Max 512GB Chính hãng</td>
                                            <td data-label="quantity" class="orders-input">
                                                <input type="number" min="1" value="1">
                                            </td>
                                            <td data-label="cost" class="orders-input">
                                                <input type="number" min="1" value="1">
                                            </td>
                                            <td class="orders-input" id = "orders-amount" style="text-align: right;">
                                                <input type="text">
                                            </td>
                                            <td class="orders-input" >
                                                <input type="text" style="width:100%;text-align: left;">
                                            </td>
                                            <td>
                                                <div class="btn">
                                                    <div class="btn__edit">
                                                        <a href="#" class="btn__link">
                                                            <i class="btn_icon fas fa-pencil-alt"></i>
                                                        </a>
                                                    </div>
                                                    <div class="btn__delete">
                                                        <a href="#" class="btn__link">
                                                            <i class="btn_icon far fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- <?php
                                        while ($row = mysqli_fetch_row($query)) { ?>
                                            <tr class="table__content">
                                                <td class=""><?php echo $row[0]; ?> </td>
                                                <td class="items__img"><?php echo $row[1]; ?></td>
                                                <td class=""><?php echo $row[2]; ?> </td>
                                                <td class="items__quantity"><?php echo $row[3]; ?></td>
                                                <td>
                                                    <p class="items__decription">
                                                        <?php echo $row[4]; ?>
                                                    </p>
                                                </td>
                                                <td class="items__orders"><?php echo $row[5]; ?></td>
                                                <td class="items__price"><?php echo $row[6]; ?></td>
                                                <td>
                                                    <div class="btn">
                                                        <div class="btn__view">
                                                            <a href="index.php?page_layout=view&id=<?php echo $row[0];?>" class="btn__link">
                                                                <i class="btn_icon far fa-eye"></i>
                                                            </a>
                                                        </div>
                                                        <div class="btn__edit">
                                                            <a href="index.php?page_layout=edit&id=<?php echo $row[0];?>" class="btn__link">
                                                                <i class="btn_icon fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div class="btn__delete">
                                                            <a onclick="return Del('<?php echo $row[2];?>')" href="index.php?page_layout=delete&id=<?php echo $row[0];?>" class="btn__link">
                                                            <i class="btn_icon far fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-3">
                     <div class="row">
                     <div class="col l-12 ">
                        <div class="form-group">
                                 <input type="text" name="InvoiceId">
                                 <label>Mã hóa đơn<span>*</span></label>
                             </div>
                         <div class="col l-12">
                             <div class="form-group">
                                 <input type="text" name="title">
                                 <label>Tên hóa đơn<span>*</span></label>
                             </div>
                         </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="datetime-local" name="InvoiceDate">
                                <label>Ngày hóa đơn<span>*</span></label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="datetime-local" name="receivedDate">
                                <label>Ngày đặt hàng<span>*</span></label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="datetime-local" name="soldDate">
                                <label>Ngày hoàn thành hóa đơn<span>*</span></label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="text" name="cusId">
                                <label>Mã khách hàng<span>*</span></label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="text" name="staffId">
                                <label>Mã nhân viên<span>*</span></label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="text" name="status">
                                <label>Trạng thái</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="text" name="notes">
                                <label>Ghi chú</label>
                            </div>
                        </div>

                         <!-- Thành tiền + Orders Button -->
                         
                     </div>              
                </div>
            
                
            </div>
            <div class="row">
                <div class="col l-9">
                    <div class="col l-12">
                        <div id="chitiet-hoadon" class="row">
                            <div class="col l-3">
                                <div class="form-group">
                                <input type="text" name="Subtotal">
                                    <label>Tổng tiền trước thuế</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="discount">
                                    <label>số tiền chiết khấu/ giảm giá</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="tax">
                                    <label>số tiền thuế</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="discountpercent">
                                    <label>Phần trăm số tiền chiết khấu/giảm giá</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-3">
                             <div class="row">
                                 <div class="col l-12">
                                     <div class="form-group">
                                         <input type="text" name="amount">
                                         <label>Thành tiền</label>
                                     </div>
                                 </div>
                                 
                                 <div class="col l-3 m-12 c-12">
                                    <button class = "form__button" type="submit" name="submit">Lưu thông tin hóa đơn</button>
                                </div>
                                <div class="col l-3 m-12 c-12">
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


    