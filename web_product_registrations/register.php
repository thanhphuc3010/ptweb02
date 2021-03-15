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
            <p>Qúy khách vui lòng điền đầy đủ thông tin để nhân viên tư vấn cho mình ạ :) </p>
        </div>

        <form action="#">
            <div class="user-details">
                <div class="input-box">
                    <label class="details">Tên người liên hệ<span>*</span></label>
                    <input name="fullname" type="text" placeholder=" Your answer" required>
                </div>
                <div class="input-box">
                    <label class="details">Tên doanh nghiệp/cơ sở dịch vụ<span>*</span></label>
                    <input name="company" type="text" placeholder=" Your answer" required />
                </div>
                <div class="input-box">
                    <label class="details">Email address<span>*</span></label>
                    <input name="email" type="text" placeholder=" Your email" required>
                </div>
                <div class="input-box">
                    <label class="details">Số điện thoại liên hệ<span>*</span></label>
                    <input name="phone" type="text" placeholder=" Your answer" required>
                </div>
                <div>
                    <label class="details">Loại hình dịch vụ của công ty bạn?<span>*</span></label>
                    <br>
                    <input type="checkbox"> <label>Dịch vụ</label>
                    <br />
                    <input type="checkbox"> <label>Thương mại</label>
                    <br />
                    <input type="checkbox"> <label>Sản xuất</label>
                    <br />
                    <input type="checkbox"> <label>Other <input type="text"></label>
                </div>
                <div class="input-box">
                    <label class="details">Địa chỉ doanh nghiệp/cơ sở dịch vụ?<span>*</span></label>
                    <input name="address" type="text" placeholder=" Your answer" required>
                </div>
                <div>
                    <label class="details">Số chi nhánh-cửa hàng/cơ sở dịch vụ?<span>*</span></label>
                    <br>
                    <input type="checkbox"> <label>1 sơ sở</label>
                    <br>
                    <input type="checkbox"> <label>2 cơ sở</label>
                    <br>
                    <input type="checkbox"> <label>3 cơ sở</label>
                    <br>
                    <input type="checkbox"> <label>Nhiều hơn 3 cơ sở</label>
                </div>
                <div class="input-box">
                    <label class="details">Số nhân sự<span>*</span></label>
                    <input type="text" placeholder=" Your answer" required>
                </div>
                <div>
                    <label class="details">Nghành kinh doanh?<span>*</span></label>
                    <br>
                    <input type="checkbox"> <label>Ảnh viện/Áo cưới/Studio</label>
                    <br>
                    <input type="checkbox"> <label>Ôto/Xe máy</label>
                    <br>
                    <input type="checkbox"> <label>Điện tử/Thiết bị di động/Thiết bị văn phòng-Máy tính</label>
                    <br>
                    <input type="checkbox"> <label>Xuất nhập khẩu/Phân phối</label>
                    <br>
                    <input type="checkbox"> <label>Bất động sản</label>
                    <br>
                    <input type="checkbox"> <label>Spa/Salon/Nail/Chăm sóc sức khỏe/Thẩm mỹ viện</label>
                    <br>
                    <input type="checkbox"> <label>Siêu thị bán lẻ</label>
                    <br>
                    <input type="checkbox"> <label>Dịch vụ cho thuê</label>
                    <br>
                    <input type="checkbox"> <label>Trung tâm thú y</label>
                    <br>
                    <input type="checkbox"> <label>Other <input type="text"></label>
                </div>
                <div>
                    <label class="details">Bạn biết đến chúng tôi qua kênh nào?<span>*</span></label>
                    <br>
                    <input type="checkbox"> <label>Bạn bè giới thiệu</label>
                    <br>
                    <input type="checkbox"> <label>Trang Web</label>
                    <br>
                    <input type="checkbox"> <label>Facebook/Mạng xã hội</label>
                    <br>
                    <input type="checkbox"> <label>Quảng cáo</label>
                    <br>
                    <input type="checkbox"> <label>Other <input type="text"></label>
                </div>
                <br>
                <div class="input-box">
                    <label class="details"> Tôi có thể tư vấn cho bạn vào khung giờ nào?</label>
                    <input name="contactTime" type="text" placeholder=" Your answer" required>
                </div>
                <br>
                <div class="input-box">
                    <label class="details">Nhu cầu của bạn đối với sản phẩm của chúng tôi?<span>*</span></label>
                    <input name="yourNeeds" type="text" placeholder=" Your answer" required>
                </div>
                <br>
                <div class="button">
                    <input type="submit" value="submit">
                </div>
            </div>
        </form>
    </div>
</body>
</html>