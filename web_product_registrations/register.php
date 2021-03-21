<?php 
    $connect = mysqli_connect('localhost','root','Thanhphuc3010@','ptweb002');
    if (!$connect) {
        echo "Connect to database is fail";
    }
?>
<!DOCTYPE html>
<html lang="en">
<!--designined by Tra My-->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h2> Đăng kí mua hàng <h2>
        </div>
        <div>
            <p>Quý khách vui lòng điền đầy đủ thông tin để được hỗ trợ và tư vấn</p>
        </div>

        <form action="test.php" method="POST">
            <div class="user-details">
                <div class="form-group">
                    <label class="details">Tên người liên hệ<span>*</span></label>
                    <input name="fullname" type="text" placeholder=" Your answer" required>
                </div>
                <div class="form-group">
                    <label class="details">Tên doanh nghiệp/cơ sở dịch vụ<span>*</span></label>
                    <input name="company" type="text" placeholder=" Your answer" required />
                </div>
                <div class="form-group">
                    <label class="details">Email address<span>*</span></label>
                    <input name="email" type="text" placeholder=" Your email" required>
                </div>
                <div class="form-group">
                    <label class="details">Số điện thoại liên hệ<span>*</span></label>
                    <input name="phone" type="text" placeholder=" Your answer" required>
                </div>
                <div>
                    <label class="details">Loại hình dịch vụ của công ty bạn?<span>*</span></label>
                    <br>
                    <input name="serviceType" type="radio" value="Dịch vụ"> <label>Dịch vụ</label>
                    <br />
                    <input name="serviceType" type="radio" value="Thương mại"> <label>Thương mại</label>
                    <br />
                    <input name="serviceType" type="radio" value="Sản xuất"> <label>Sản xuất</label>
                    <br />
                    <input name="serviceType" type="radio" id="checkbox" value = "Others" onclick="myCheck()">
                    <label><input id ="other" placeholder="Others" type="text" onkeyup="myValue()"></label>
                </div>
                <div class="form-group">
                    <label class="details">Địa chỉ doanh nghiệp/cơ sở dịch vụ?<span>*</span></label>
                    <input name="address" type="text" placeholder=" Your answer" required>
                </div>
                <div>
                    <label class="details">Số chi nhánh-cửa hàng/cơ sở dịch vụ?<span>*</span></label>
                    <br>
                    <input name="numberOfBranch" type="radio" value="1"> <label>1 sơ sở</label>
                    <br>
                    <input name="numberOfBranch" type="radio" value="2"> <label>2 cơ sở</label>
                    <br>
                    <input name="numberOfBranch" type="radio" value="3"> <label>3 cơ sở</label>
                    <br>
                    <input name="numberOfBranch" type="radio" value="4"> <label>Nhiều hơn 3 cơ sở</label>
                </div>
                <div class="form-group">
                    <label class="details">Số nhân sự<span>*</span></label>
                    <input type="text" placeholder=" Your answer" required>
                </div>
                <div>
                    <label class="details">Nghành kinh doanh?<span>*</span></label>
                    <br>
                    <input name="businessField" type="radio" value="Ảnh viện/Áo cưới/Studio"><label>Ảnh viện/Áo cưới/Studio</label>
                    <br>
                    <input name="businessField" type="radio" value="Ôto/Xe máy"> <label>Ôto/Xe máy</label>
                    <br>
                    <input name="businessField" type="radio" value="Điện tử/Thiết bị di động/Thiết bị văn phòng-Máy tính"> <label>Điện tử/Thiết bị di động/Thiết bị văn phòng-Máy tính</label>
                    <br>
                    <input name="businessField" type="radio" value="Xuất nhập khẩu/Phân phối"> <label>Xuất nhập khẩu/Phân phối</label>
                    <br>
                    <input name="businessField" type="radio" value="Bất động sản"> <label>Bất động sản</label>
                    <br>
                    <input name="businessField" type="radio" value="Spa/Salon/Nail/Chăm sóc sức khỏe/Thẩm mỹ viện"> <label>Spa/Salon/Nail/Chăm sóc sức khỏe/Thẩm mỹ viện</label>
                    <br>
                    <input name="businessField" type="radio" value="Siêu thị bán lẻ"> <label>Siêu thị bán lẻ</label>
                    <br>
                    <input name="businessField" type="radio" value="Dịch vụ cho thuê"> <label>Dịch vụ cho thuê</label>
                    <br>
                    <input name="businessField" type="radio" value="Trung tâm thú y"> <label>Trung tâm thú y</label>
                    <br>
                    <input name="businessField" type="radio" id="businessField" onclick="checkBusinessField()"> 
                    <label><input placeholder="Others" type="text" id="inputbusinessField" onkeyup="getValuebf()"></label>
                </div>
                <div>
                    <label class="details">Bạn biết đến chúng tôi qua kênh nào?<span>*</span></label>
                    <br>
                    <input name="informationSource" type="radio"> <label>Bạn bè giới thiệu</label>
                    <br>
                    <input name="informationSource" type="radio" value="Trang Web"> <label>Trang Web</label>
                    <br>
                    <input name="informationSource" type="radio" value="Facebook/Mạng xã hội"> <label>Facebook/Mạng xã hội</label>
                    <br>
                    <input name="informationSource" type="radio" value="Quảng cáo"> <label>Quảng cáo</label>
                    <br>
                    <input name="informationSource" type="radio" id="InforSource" onclick="getValuebf()"> 
                    <label><input type="text" placeholder="Others" id="inputInforSource" onkeyup="getInforSource()"></label>
                </div>
                <br>
                <div class="form-group">
                    <label class="details"> Tôi có thể tư vấn cho bạn vào khung giờ nào?</label>
                    <input name="contactTime" type="text" placeholder=" Your answer" required>
                </div>
                <br>
                <div class="form-group">
                    <label class="details">Nhu cầu của bạn đối với sản phẩm của chúng tôi?<span>*</span></label>
                    <input name="yourNeeds" type="text" placeholder=" Your answer" required>
                </div>
                <br>
                <div class="button">
                    <input type="submit" value="submit" name="submit">
                </div>
            </div>
        </form>
    </div>
    <script>

        // Lấy input other of Service Type
        function myCheck() {
            var a = document.getElementById('checkbox');
            var b = document.getElementById('other');
            if (a.checked == true){
                a.value = b.value;
            } 
        }
        function myValue() {
            var a = document.getElementById('checkbox');
            var b = document.getElementById('other');
            a.value = b.value;
        }

        // Lấy input other of BusinessField
        function checkBusinessField() {
            var a = document.getElementById('businessField');
            var b = document.getElementById('inputbusinessField');
            if (a.checked == true){
                a.value = b.value;
            } 
        }
        function getValuebf() {
            var a = document.getElementById('businessField');
            var b = document.getElementById('inputbusinessField');
            a.value = b.value;
        }

        // Lấy input other of Information Source
        function checkInforSource() {
            var a = document.getElementById('InforSource');
            var b = document.getElementById('inputInforSource');
            if (a.checked == true){
                a.value = b.value;
            } 
        }
        function getInforSource() {
            var a = document.getElementById('InforSource');
            var b = document.getElementById('inputInforSource');
            a.value = b.value;
        }

    </script>
</body>

</html>