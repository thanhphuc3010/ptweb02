
<?php
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $servicetype=$_POST['sevicetype'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $company=$_POST['company'];
        $address=$_POST['address'];
        $numberOfBranch=$_POST['BusinessField'];
        $informationSource=$_POST['informationSource'];
        $contactTime = $_POS['contacTime'];
        $yourNeed = $_POST['yourNeed'];
        $created_date=$_POST['created_date'];
        $update_date=$_POST['update_date'];
    
        $sql = "INSERT INTO customers (id,fullname,servicetypetype,phone,email,company,address,BusinessField,informationSource,contacTime,yourNeed,created_date,update_date)";

        $query = mysqli_query($connect,$sql);
        header('location: index.php?page_layout=list');
    }
?>



<div class="container">
        <div class="litle"> <h2> Đăng kí mua hàng <h2> </div>
        <div>
            <p>Qúy khách vui lòng điền đầy đủ thông tin để nhân viên tư vấn cho mình ạ :) </p>
        </div>
    
        <form action="#"> 
            <div class="user-details">
                <div class="input-box">
                <label class="details">Tên người liên hệ<span>*</span></label>
                <input type="text" placeholder=" Your answer" required>
            </div>
            <div class="input-box">
                <label class="details">Tên doanh nghiệp/cơ sở dịch vụ<span>*</span></label>
                <input type="text" placeholder=" Your answer" required/>
            </div>
            <div class="input-box">
                <label class="details">Email address<span>*</span></label>
                <input type="text" placeholder=" Your email" required>
            </div>
            <div class="input-box">
                <label class="details">Số điện thoại liên hệ<span>*</span></label>
                <input type="text" placeholder=" Your answer" required>
            </div>
            <div>
                <label class="details">Loại hình dịch vụ của công ty bạn?<span>*</span></label>
            <br>
            <input type="checkbox"> <label>Dịch vụ</label>
            <br/>
            <input type="checkbox" <label>Thương mại</label>
            <br/>
            <input type="checkbox" <label>Sản xuất</label>
            <br/>
            <input type="checkbox" <label>Other <input type="text"></label>
            </div>
            <div class="input-box">
                <label class="details">Địa chỉ doanh nghiệp/cơ sở dịch vụ?<span>*</span></label>
                <input type="text" placeholder=" Your answer" required>
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
                    <input type="checkbox" <label>Other <input type="text"></label>
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
                        <input type="checkbox" <label>Other <input type="text"></label>
                        </div>
                        <br>
                        <div class="input-box">
                            <label class="details"> Tôi có thể tư vấn cho bạn vào khung giờ nào?</label>
                            <input type="text" placeholder=" Your answer" required>
                        </div>
                        <br>
                        <br>

                        <div class="input-box">
                            <label class="details">Nhu cầu của bạn đối với sản phẩm của chúng tôi?<span>*</span></label>
                            <input type="text" placeholder=" Your answer" required>
                        </div>
                        <br>
                        <div class="button">
                            <input type="submit" value="submit">
                        </div>
     
        </form>
    </div>