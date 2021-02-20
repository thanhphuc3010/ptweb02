* table itemPurchaseOrderDetails là bảng chứa thông tin các mặt hàng được đặt hàng tương ứng với số đơn hàng trong bảng itemPurchaseOrders.
* Cần chức năng để thêm, sửa, xóa một mặt hàng vào đơn hàng.
  + Thêm một hoặc nhiều mã hàng, số lượng, đơn giá, thành tiền ==> vào đơn hàng.
    Cần chức năng tìm kiếm mặt hàng khi thêm (do có thể có nhiều mặt hàng)
  + Sửa lại số lượng đặt hàng khi đơn hàng đang ở trạng thái PENDING hoặc OPEN (đang soạn hoặc đang đặt hàng)
  + Xóa mặt hàng khỏi đơn hàng: chỉ xóa khi đơn hàng đang ở trạng thái PENDING, hoặc OPEN nhưng chưa nhận hàng về.
  + Tìm kiếm mặt hàng trong đơn hàng (do đơn hàng có thể có nhiều mặt hàng)
