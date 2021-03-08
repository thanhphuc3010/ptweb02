<?php
    $id = $_GET['id'];
    $sql_up = "SELECT * FROM itempurchasrorders WHERE poId ='$id'";
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


        $poId = $_POST['poId'];
        $orderDate= $_POST['orderDate'];
        $poNumber = $_POST['poNumber'];
        $supplierId = $_POST['supplierId'];
        $remark = $_POST['remark'];
        $paymentTermId = $_POST['paymentTermId'];
        $staffId = $_POST['staffId'];
        $status = $_POST['status'];
        $receiveDate = $_POST['receiveDate'];
        $billingStatus = $_POST['billingStatus'];
        /*$price = $_POST['price'];
        $wholeSalePrice = $_POST['wholeSalePrice'];
        $specialPrice = $_POST['specialPrice'];
        $tax = $_POST['tax'];*/

        $sql = "UPDATE itempurchasrorders SET poId='$poId', orderDate='$orderDate', poNumber='$poNumber', supplierId='$supplierId', remark='$remark', paymentTermId='$paymentTermId', staffId='$staffId', status ='$status', receiveDate='$receiveDate', billingStatus='$billingStatus',updated_date=NOW() WHERE poId ='$id'"; 
        /*cost=$cost, price=$price,wholeSalePrice=$wholeSalePrice, specialPrice = specialPrice, tax=$tax, image='$image',*/

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
                                <h1 class="card__title">Sửa đổi thông tin đơn hàng</h1>
                            </div>
                        </div>
                        <div class="card__body">
                            <form class="row" method="POST" name="items-form" id="items-form" enctype="multipart/form-data">
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="poId" required value="<?php echo $row_up['poId'];?>">
                                        <label>Mã đơn hàng<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group" > <!--id = "image__file">-->
                                        <input type="text" name="orderDate" value="<?php echo $row_up['orderDate'];?>"> 
                                        <!-- accept="image/*" >-->
                                        <label>Ngày đặt hàng</label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="poNumber" required value="<?php echo $row_up['poNumber'];?>">
                                        <label>Số đơn hàng<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="supplierId" value="<?php echo $row_up['supplierId'];?>">
                                        <label>Nhà cung cấp</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="receiveDate" value="<?php echo $row_up['receiveDate'];?>">
                                        <label>Ngày dự kiến nhận</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="staffId" value="<?php echo $row_up['staffId'];?>">
                                        <label>Mã nhân viên<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                    <select name="status" id="">
                                            <option value="pending">pending</option>
                                            <option value="pending">open</option>
                                            <option value="pending">done</option>
                                        </select>
                        
                                        <label>Trạng thái</label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                    <select name="status" id="">
                                            <option value="pending">no_bill</option>
                                            <option value="pending">has_bill</option>
                                            <option value="pending">done</option>
                                        </select>
                                        <label>Tình trạng hóa đơn</label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <textarea rows="6" name="remark" value="<?php echo $row_up['remark'];?>"></textarea>
                                        <label>Ghi chú<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="paymentTermId" value="<?php echo $row_up['paymentTermId'];?>">
                                        <label>Điều kiện thanh toán</label>
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
                                <p>Copyright &#169; by NHTT</p>
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
