<?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './PHPMailer-master/src/Exception.php';
    require './PHPMailer-master/src/OAuth.php';
    require './PHPMailer-master/src/PHPMailer.php';
    require './PHPMailer-master/src/POP3.php';
    require './PHPMailer-master/src/SMTP.php';
    
    require_once './config/connect.php';
    
    if(isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $company = $_POST['company'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $serviceType = $_POST['serviceType'];
        $address = $_POST['address'];
        $numberOfBranch = $_POST['numberOfBranch'];
        $businessField = $_POST['businessField'];
        $informationSource = $_POST['informationSource'];
        $contactTime = $_POST['contactTime'];
        $yourNeeds = $_POST['yourNeeds'];

        echo $fullname;
        echo $company;
        echo $email;
        echo $phone;
        echo $serviceType;
        echo $address;
        echo $numberOfBranch;
        echo $businessField;
        echo $informationSource;
        echo $contactTime;
        echo $yourNeeds;

        $sql = "INSERT INTO `web_product_registrations` (`email`, `company`, `fullname`, `serviceType`, `address`, `phone`, `numberOfBranch`, `businessField`, `informationSource`, `contactTime`, `yourNeeds`) VALUES ('$email', '$company', '$fullname', '$serviceType', '$address', '$phone', $numberOfBranch, '$businessField', '$informationSource', '$contactTime', '$yourNeeds')";

        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo "Insert success";
        } else {
            echo "Insert Fail";
        }



        //Load Composer's autoloader
    //require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 1;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'acekembbc@gmail.com';                     //SMTP username
        $mail->Password   = '0972225783';                               //SMTP password
        $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('acekembbc@gmail.com', 'ThanhPhuc');
        $mail->addAddress($email);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('acekembbc@gmail.com', 'Information');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Đây là tiêu đề';

        $content = <<<Content
        Bạn đã đăng ký sử dụng sản phẩm của chúng tôi thành công. Các thông tin dữ liệu bao gồm:
            <br><b>Họ tên khách hàng:</b> {$fullname} 
            <br><b>Tên công ty:</b> {$company}
            <br><b>Email:</b> {$email}
            <br><b>Số điện thoại:</b> {$phone}
            <br><b>Loại hình dịch vụ:</b> {$serviceType}
            <br><b>Địa chỉ cơ quan:</b> {$address}
            <br><b>Số lượng chi nhánh:</b> {$numberOfBranch}
            <br><b>Ngành nghề kinh doanh:</b> {$businessField}
            <br><b>Thời gian tư vấn:</b> {$contactTime}
            <br><b>Nhu cầu của bạn:</b> {$yourNeeds}
        <br>Cảm ơn vì đã lựa chọn chúng tôi!
        Content;
        // Heredoc
        $mail->Body    = $content;
        $mail->AltBody = 'Pham Thanh Phuc';
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    };
};
?>