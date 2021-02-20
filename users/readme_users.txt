Users - bảng quản lý tài khoản người dùng
Cần làm các chức năng:
* Thêm người dùng mới.
  + userId sẽ tăng từ thấp đến cao, và không cấp lại các số cũ. Do vậy chương trình phải tự tạo ra userId, không để người dùng từ nhập.
  + lựa chọn role là các số nằm trong khoảng 1 đến 100. số 1 là mức quyền cao nhất. không chọn thì default sẽ là 100.
  + email là địa chỉ email dùng để xác thực, lấy lại mật khẩu và để đăng nhập chương trình.
  + không cần thêm dữ liệu cho trường created_date, mysql tự thêm giá trị thời gian tạo tài khoản.
* Xóa người dùng.
* Sửa thông tin (email hoặc fullname)

  