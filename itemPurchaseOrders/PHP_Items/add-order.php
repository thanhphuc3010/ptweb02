<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                <table class="content-table orders" id="thetable">
                                    <thead class="data__title">
                                        <tr id = "data-title" class="table__title">
                                            <th class="col_1-2" style="text-align:left;" >Mã sản phẩm</th>
                                            <th class="col_2">Tên sản phẩm</th>
                                            <th class="">Số lượng đặt</th>
                                            <th class="">Giá nhập</th>
                                            <th class="col_1-2" style="text-align: right;">Thành tiền</th>
                                            <th class="col_2">Ghi chú</th>
                                            <th class="">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody class="data_content">
                                        
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
                                <input id="poNumber" type="text" name="location" required>
                                <label>Mã đơn hàng</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <label style="font-size:var(--medium-font-size);padding-bottom:5px;">Trạng thái đơn hàng</label>
                            <div class="status" id="status-list">
                                <div class="status-select">
                                    <span class="status-selected">Pending</span>
                                    <i class="fa fa-angle-down status-caret"></i>
                                </div>
                                <ul class="status-list">
                                    <li class="status-item" data-value="Pending">
                                    Pending
                                    </li>
                                    <li class="status-item" data-value="Open">
                                    Open
                                    </li>
                                    <li class="status-item" data-value="Done">
                                    Done
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input class="datetime"id="orderDate" placeholder="Hôm nay"  name="orderDate" required>
                                <label>Ngày đặt hàng</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input  class="datetime" id="receiveDate" name="receiveDate" required>
                                <label>Ngày dự kiến nhận</label>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input id="staffId" type="text" name="staffId" required>
                                <label>Mã nhân viên</label>
                                <div class="staff">
                                <ul class="staff-list ">
                                    <li class="staff-items">
                                        Phạm Thanh Phúc
                                    </li>
                                    <li class="staff-items">
                                        Phạm Thanh Phúc
                                    </li>
                                    <li class="staff-items">
                                        Phạm Thanh Phúc
                                    </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <div class="col l-12">
                            <div class="form-group">
                                <input type="text" name="paymentTermId">
                                <label>Điều khoản thanh toán</label>
                            </div>
                        </div>
                    </div>              
                </div>
            
                
            </div>
            <div class="row">
                <div class="col l-9">
                    <div class="col l-12">
                        <div id="supplier" class="row">
                            <div class="col l-3">
                                <div class="form-group">
                                    <input id="supplierName"type="text" name="supplierName">
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
                            <div class="col l-6">
                                <div class="btn__genernal btn-orders">
                                    <button type="button" onclick="window.location.href='index.php?page_layout=list-orders';" class="items__add" id="btn-back">
                                        <i class="fas fa-arrow-left items__icon"></i>
                                        <p>Quay lại</p>
                                    </button>
                                </div>
                            </div>
                            <div class="col l-6">
                                <div class="btn__genernal btn-orders">
                                    <button type="button"onclick="window.location.href='index.php?page_layout=list-orders';" class="items__add" id="add-orders">
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
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous"></script>
<script src="./main.js"> </script>
<script type="text/javascript" src="http://github.com/sauerc/jAutoCalc/raw/master/jAutoCalc.js"></script>
<script>
    $('.datetime').datetimepicker();

    window.addEventListener("load", function () {
        const statusItems = document.querySelectorAll(
        "#status-list .status-item"
        );
        const statusSelect = document.querySelector(
        "#status-list .status-select"
        );
        const statusSelectText = document.querySelector(
        "#status-list .status-selected"
        );
        const statusList = document.querySelector(
        "#status-list .status-list"
        );
        const statusCaret = document.querySelector(
        "#status-list .status-caret"
        );

        statusSelect.addEventListener("click", function () {
        statusList.classList.toggle("show");
        statusCaret.classList.toggle("fa-angle-up");
        });

        function handleSelectstatus(e) {
            const { value } = e.target.dataset;
            statusSelectText.textContent = value;
            statusList.classList.remove("show");
            statusCaret.classList.remove("fa-angle-up");
            }
        statusItems.forEach((el) =>
        el.addEventListener("click", handleSelectstatus)
        );
    });
</script>