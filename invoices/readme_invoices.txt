* invoices, là bảng lưu trữ danh sách các hóa đơn bán hàng.
* invoices sẽ có quan hệ 1-nhiều với bảng invoiceItems nơi lưu trữ danh sách các mặt hàng bán ra cùng các thông tin về số lượng bán, giá bán, bán của lần nhận hàng nào, ...
* cần thực hiện các chức năng đối với hóa đơn bán hàng:
  + Thêm hóa đơn
  + Sửa thông tin hóa đơn
    . chỉ được sửa thông tin hóa đơn có trạng thái đang soạn (PENDING), báo giá (QUOTE) hoặc đặt hàng (RESERVED)
    . các hóa đơn đã hoàn thành thì chỉ được xem
  + Báo giá: khi thực hiện gửi báo giá đến cho khách hàng thì yêu cầu phải có thông tin khách hàng, và chuyển sang trạng thái báo giá (QUOTE).
  + Xóa hóa đơn: một hóa đơn bị xóa, sẽ được đổi sang trạng thái Mất cơ hội kinh doanh (LOST_SALE), vẫn có thể xem lại được và sử dụng để thống kê sau đó. Tuy nhiên, khi xóa cần hỏi rõ là xóa/hay ghi nhận mất cơ hội kinh doanh.
  + Thêm các mặt hàng cần bán vào hóa đơn (xem thêm invoiceItems)
  + Tìm kiếm
  + In hóa đơn
