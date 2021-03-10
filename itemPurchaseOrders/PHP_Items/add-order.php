<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $(".search-products").keyup(function() {
            var txt = $(".search-products").val();
            if(txt != "") {
                $(".dropdown").fadeIn();
                $.post("./PHP_Items/search-items.php", {data: txt}, function(data) {
                $(".dropdown-list").html(data);
                });
            } else {
                $(".dropdown-list").html("");
                $(".dropdown").fadeOut();
            }
        });
        
        $(document).on("click",".dropdown-items",function() {
                var mess = $(".id-products").val()
                $.post("./PHP_Items/search-items.php", {id: mess}, function (data) {
                    $("table__content").append("<li>Appended item</li>")
                });
                $(".dropdown").fadeOut();
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
                        <li class="account__items language">
                            <a id="btn_lang" class="language__link" href="#">
                                <img src="./assets/img/vietnam_flag.jpg" alt="vietnam flag">
                                Vi
                            </a>
                        </li>
                        <li class="account__items user__icon "><i class="far fa-envelope"></i></li>
                        <li class="account__items user__icon "><i class="far fa-bell"></i></li>
                        <li class="account__items">
                            <a href="#" class="account__link">
                                <img class="account__img" src="./assets/img/user.png" alt="user">
                            </a>
                        </li>
                    </ul>
                    <!-- Drop_box_Language -->
                    <div id="dropbox" class="dropbox">
                        <ul class="dropbox__list">
                            <li class="dropbox__items">
                                <a class="dropbox__link" href="#">
                                    <img src="./assets/img/vietnam_flag.jpg" alt="vietnam flag">
                                    Vietnamese
                                </a>
                            </li>
                            <li class="dropbox__items">
                                <a class="dropbox__link" href="#">
                                    <img src="./assets/img/england_flag.png" alt="england flag">
                                    English
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="main">
        <div class="grid wide-order">
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
                        <div class="col l-12 table-orders">
                            <div class="purorder">
                                <table class="content-table orders">
                                    <thead class="data__title">
                                        <tr class="table__title">
                                            <th class="col_1-2">Mã sản phẩm</th>
                                            <th class="col_2">Tên sản phẩm</th>
                                            <th class="">Số lượng đặt</th>
                                            <th class="">Giá nhập</th>
                                            <th class="col_1-2">Thành tiền</th>
                                            <th class="col_2">Ghi chú</th>
                                            <th class="">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="data_content">
                                        <tr class="table__content">
                                            <td class="">ITEM00001</td>
                                            <td class="items__img">Điện thoại Iphone 12 Pro Max 512GB Chính hãng</td>
                                            <td class="orders-input">
                                                <input type="number" min="1" value="1">
                                            </td>
                                            <td class="orders-input">
                                                <input type="number">
                                            </td>
                                            <td>20</td>
                                            <td>20</td>
                                            <td>
                                                <div class="btn">
                                                    <div class="btn__view">
                                                        <a href="#" class="btn__link">
                                                            <i class="btn_icon far fa-eye"></i>
                                                        </a>
                                                    </div>
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
                         <div class="col l-12">
                             <div class="form-group">
                                 <input type="text" name="location">
                                 <label>Mã đơn hàng</label>
                             </div>
                         </div>
                         <div class="col l-12">
                             <div class="form-group">
                                 <input type="text" name="location">
                                 <label>Mã nhận hàng</label>
                             </div>
                         </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="datetime-local" name="orderDate">
                                <label>Ngày đặt hàng</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="datetime-local" name="receiveDate">
                                <label>Ngày dự kiến nhận</label>
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
                                <input type="text" name="paymentTermId">
                                <label>Điều khoản thanh toán</label>
                            </div>
                        </div>

                         <!-- Thành tiền + Orders Button -->
                         
                     </div>              
                </div>
            
                
            </div>
            <div class="row">
                <div class="col l-9">
                    <div class="col l-12">
                        <div class="row">
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="supplierName">
                                    <label>Tên nhà cung cấp</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="supplierId">
                                    <label>Mã nhà cung cấp</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="phone">
                                    <label>Số điện thoại</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="email" name="email">
                                    <label>Email</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l-12">
                        <div class="row">
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="address">
                                    <label>Địa chỉ</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="city">
                                    <label>Tỉnh</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="county">
                                    <label>Huyện</label>
                                </div>
                            </div>
                            <div class="col l-3">
                                <div class="form-group">
                                    <input type="text" name="remark">
                                    <label>Ghi chú</label>
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
                                 <div class="col l-12">
                                     <div class="btn__genernal btn-orders">
                                         <button type="submit" class="items__add">
                                             <i class="fas fa-plus items__icon "></i>
                                             <p>Tạo mới</p>
                                         </button>
                                     </div>
                                 </div>
                             </div>
                         </div>                       
            </div>
        </div>
    </div>
</div>