* itemPurchaseOrders là bảng lưu trữ thông tin về các đơn đặt hàng khi doanh nghiệp thực hiện mua hàng từ các nhà cung cấp về để bán.
* Bên cạnh table itemPurchaseOrders, sẽ có thêm table itemPurchaseOrderDetails để chưa các thông tin chi tiết về các mặt hàng được đặt hàng trong đơn đặt hàng tương ứng ở bảng itemPurchaseOrders.
* Quan hệ giữa itemPurchaseOrders và itemPurchaseOrderDetail là quan hệ 1-nhiều, túc là mỗi đơn hàng có thể đặt mua cùng lúc nhiều mặt hàng.
* Cần làm các chức năng:
  + Tạo đơn hàng mới để thực hiện đặt hàng (mua hàng về)
    Nhập các thông tin của đơn hàng,
    thêm các mặt hàng vào itemPurchaseOrderDetails
  + Sửa đơn đặt hàng
    Sửa các thông tin đơn hàng,
    thêm bớt các mặt hàng ở itemPurchaseOrderDetails
  + Xóa đơn đặt hàng,
    Đơn hàng chỉ được xóa khi đang soạn (PENDING status),
    hoặc đang đặt hàng (OPEN status) nhưng chưa nhận hàng.
  + Tìm kiếm đơn hàng theo số đơn hàng, nhà cung cấp hoặc ghi chú
  + Thực hiện in đơn hàng
