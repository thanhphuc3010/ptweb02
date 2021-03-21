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
  <body class="  ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
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
                        <li class="account__items language">
                            <a id="btn_lang" class="language__link" href="#">
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

    
      <div class="container-fluid">
         <div class="row">                  
            <div class="col-l-12">
               <div class="card card-block card-stretch card-height print rounded">
                  <div class="card-header d-flex justify-content-between bg-primary header-invoice">
                         <div class="form-group">
                            <input type="text" name="InvoiceId">
                            <label>Mã hóa đơn</label> <br/>
                         </div>
                         <div class="btn__genernal">
                            <h1 class="invoices__title">
                                Detail Invoice
                            </h1> <br/>
                            <button type="button" onclick="edit()">Sửa hóa đơn</button> 
                            <script>
                            function edit(){
                                 location.assign("edit_invoice.php");}
                             </script>
                            <button type="button" onclick="in()">In hóa đơn</button>
                            <script>
                            function in(){
                                 location.assign("print.php");}
                             </script>
                        </div> <br/>
                  </div>
                  <div class="card-body">
                        
                  <div class="row">
                <div class="col l-9">
                    <div class="row">
                        <div class="col l-12 search">
                            <div class="form-group">
                                <input class="search-products" type="text" name="location">
                                <label>Tìm kiếm sản phẩm của bạn:</label>
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
                
                
            </div>
            <div class="row">
                <?php
                    $connect = @mysqli_connect("localhost","root","giang123456");
                    $DBSelect = @mysqli_select_db($connect,"ptweb002"); 
                    $sql_items = "SELECT `itemNo`,`itemName`,`quantity`, `price`,`amount`, `notes` FROM `items`JOIN'invoiceitems'ON items.itemNo=invoiceitems.itemNo ";
                    $query_items = mysqli_query($connect,$sql_items);
                ?>
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
                         <div class="col1-12"style="text-align:center;">
                             <div class="form-group">
                                 <input type="text" name="title">
                                 <label>Tên hóa đơn</label>
                             </div>
                         </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="datetime-local" name="InvoiceDate">
                                <label>Ngày hóa đơn</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="datetime-local" name="receivedDate">
                                <label>Ngày đặt hàng</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="datetime-local" name="soldDate">
                                <label>Ngày hoàn thành hóa đơn</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="text" name="cusId">
                                <label>Mã khách hàng</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="text" name="staffId">
                                <label>Mã nhân viên</label>
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
                         <div>
                            <tbody>
                                
                            </tbody>

                         <!-- Thành tiền + Orders Button -->
                         
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
                             </div>
                         </div>                       
            </div>                          
                  </div>
               </div>
            </div>                                    
         </div>
      </div>
      </div>
    </div>
   
  </body>
</html>