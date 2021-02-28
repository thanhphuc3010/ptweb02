<?php
    $id = $_GET['id'];
    $sql_up = "SELECT * FROM items WHERE itemNo ='$id'";
    $query_up = mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['submit'])) {

        $itemNo = $_POST['itemNo'];

        if ($_FILES['image']['name']=='') {
            $image = $row_up['image'];
        }
        else {
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp,'image/'.$image);
        }


        $itemName = $_POST['itemName'];
        $otherName= $_POST['otherName'];
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

        $sql = "UPDATE items SET itemNo='$itemNo', itemName='$itemName', otherName='$otherName', colorId='$colorId', decription='$decription', makeId=$makeId, location='$location', usefor ='$usefor', qty_available=$qty_available, qtyOnOrder=$qtyOnOrder, cost=$cost, price=$price,wholeSalePrice=$wholeSalePrice, specialPrice = specialPrice, tax=$tax, image='$image',updated_date=NOW() WHERE itemNo ='$id'";

        $query = mysqli_query($connect,$sql);
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
                        <li  class="account__items language">
                            <a id ="btn_lang" class="language__link" href="#">
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
                                <h1 class="card__title">Sửa đổi thông tin sản phẩm</h1>
                            </div>
                        </div>
                        <div class="card__body">
                            <form class="row" method="POST" name="items-form" id="items-form" enctype="multipart/form-data">
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="itemNo" required value="<?php echo $row_up['itemNo'];?>">
                                        <label>Mã sản phẩm<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group" id = "image__file">
                                        <input type="file" name="image" accept="image/*" >
                                        <label>Hình ảnh</label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="itemName" required value="<?php echo $row_up['itemName'];?>">
                                        <label>Tên sản phẩm<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="otherName" value="<?php echo $row_up['otherName'];?>">
                                        <label>Tên khác</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="colorId" value="<?php echo $row_up['colorId'];?>">
                                        <label>Mã màu sắc</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="makeId" value="<?php echo $row_up['makeId'];?>">
                                        <label>Mã nhà sản xuất<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number" name="qty_available" value="<?php echo $row_up['qty_available'];?>">
                                        <label>Số lượng<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number" name="qtyOnOrder" value="<?php echo $row_up['qtyOnOrder'];?>">
                                        <label>Đang đặt hàng<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <textarea rows="6" name="decription" value="<?php echo $row_up['decription'];?>"></textarea>
                                        <label>Mô tả sản phẩm</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="location" value="<?php echo $row_up['location'];?>">
                                        <label>Vị trí trong kho</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text"name="usefor" value="<?php echo $row_up['usefor'];?>">
                                        <label>Sử dụng cho</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="cost" value="<?php echo $row_up['cost'];?>">
                                        <label>Giá nhập<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="price" value="<?php echo $row_up['price'];?>">
                                        <label>Giá bán lẻ<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="wholeSalePrice" value="<?php echo $row_up['wholeSalePrice'];?>">
                                        <label>Giá bán buôn<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="specialPrice" value="<?php echo $row_up['specialPrice'];?>">
                                        <label>Giá đặc biệt<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number"name="tax"value="<?php echo $row_up['tax'];?>">
                                        <label>Tỉ lệ thuế<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <button class = "form__button" type="submit" name="submit">Lưu thông tin sản phẩm</button>
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
                                <p>Copyright &#169; by PTP</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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
</script>
