<?php
if (isset($_POST['submit'])) {

    $itemNo = $_POST['itemNo'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $itemName = $_POST['itemName'];
    $otherName = $_POST['otherName'];
    $colorId = $_POST['colorId'];
    $makeId = $_POST['makeId'];
    $qty_available = $_POST['qty_available'];
    $qtyOnOrder = $_POST['qtyOnOrder'];
    $decription = $_POST['decription'];
    $location = $_POST['location'];
    $usefor = $_POST['usefor'];
    $cost = $_POST['cost'];
    $price = $_POST['price'];
    $wholeSalePrice = $_POST['wholeSalePrice'];
    $specialPrice = $_POST['specialPrice'];
    $tax = $_POST['tax'];

    $sql = "INSERT INTO items (itemNo,image,itemName,otherName,colorId,makeId,qty_available,qtyOnOrder,decription,location,usefor,cost,price,wholeSalePrice,specialPrice,tax) VALUES ('$itemNo', '$image', '$itemName', '$otherName', '$colorId', $makeId, $qty_available, $qtyOnOrder, '$decription', '$location', '$usefor', $cost, $price, $wholeSalePrice, $specialPrice, $tax)";

    $query = mysqli_query($connect, $sql);
    move_uploaded_file($image_tmp, 'image/' . $image);
    header('location: index.php?page_layout=list');
}
?>
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
    <!-- Main -->
    <div class="app">
        <div class="grid wide card">
            <div class="card__container">
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="row">
                            <div class="card__header col l-12 m-12 c-12">
                                <h1 class="card__title">Tạo mới đơn hàng</h1>
                            </div>
                        </div>
                        <div class="card__body">
                            <form class="row" method="POST" name="items-form" id="items-form" enctype="multipart/form-data">
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="itemNo" required>
                                        <label>Mã đơn hàng<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <!-- id = "image__file">-->
                                        <input type="datetime-local" name="day">
                                        <!--accept="image/*">-->
                                        <label>Ngày đặt hàng</label> <!-- Có cái sổ xuống để chọn này-->
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="itemName" required>
                                        <label>Số đơn hàng<span>*</span></label>
                                        <!--Tự sinh hoặc nhập vào-->
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="otherName">
                                        <label>Nhà cung cấp</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="datetime-local" name="colorId">
                                        <label>Ngày dự kiến nhận</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number" name="makeId">
                                        <label>Mã nhân viên<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <select name="status" id="">
                                            <option value="0">pending</option>
                                            <option value="1">open</option>
                                            <option value="2">done</option>
                                        </select>

                                        <!-- <input type="text" name="qty_available"> -->
                                        <label>Trạng thái</label>
                                        <!--Không bắt buộc-->
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <select name="billingStatus" id="">
                                            <option value="0">no_bill</option>
                                            <option value="1">has_bill</option>
                                            <option value="2">done</option>
                                        </select>
                                        <label>Tình trạng hóa đơn</label>
                                        <!--Không bắt buộc-->
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <textarea rows="6" name="decription"></textarea>
                                        <label>Ghi chú</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number" name="location">
                                        <label>Điều khoản thanh toán</label>
                                    </div>
                                </div>
                                <!--<div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text"name="usefor">
                                        <label>Sử dụng cho</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="cost">
                                        <label>Giá nhập<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="price">
                                        <label>Giá bán lẻ<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="wholeSalePrice">
                                        <label>Giá bán buôn<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="specialPrice">
                                        <label>Giá đặc biệt<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="tax">
                                        <label>Tỉ lệ thuế<span>*</span></label>
                                    </div>
                                </div>-->
                                <div class="col l-12 m-12 c-12">
                                    <button class="form__button" type="submit" name="submit">Thêm hóa đơn</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer">
        <div class="grid wide">
            <div class="footer__grid">
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="footer__box">
                            <div class="footer__detail">
                                <p class="footer__policy">
                                    <a href="#" class="policy__link"> Privacy Policy</a>
                                </p>
                                <p class="footer__use">
                                    <a href="#" class="use__link">Terms of Use</a>
                                </p>
                            </div>
                            <div class="footer__copyright">
                                <p>Copyright &#169; by NHTT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
</script>