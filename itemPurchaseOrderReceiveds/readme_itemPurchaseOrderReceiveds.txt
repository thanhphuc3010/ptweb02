* Thông tin đơn đặt hàng thể hiện ở bảng itemPurchaseOrders 

và chi tiết các mặt hàng cùng số lượng đặt và tổng đã nhận thể hiện ở bảng itemPurchaseOrderDetails,

* Còn bảng itemPurchaseOrderReceiveds là nơi lưu trữ chi tiết cho mỗi lần nhận hàng về.

Quan hệ giữa bảng itemPurchaseOrderDetails và itemPurchaseOrderReceiveds là 1 - nhiều,

tức với mỗi mặt hàng đã đặt hàng có thể nhận nhiều lần (nhà cung cấp giao hàng nhiều lần, và có thể vào nhiều ngày khác nhau).

* Cần các chức năng:

  + Nhận hàng: thêm các bản ghi vào bảng itemPurchaseOrderReceiveds

  + Sửa lại thông tin nhận hàng: ngày, số lượng hoặc ghi chú. Số lượng phải <= số lượng đặt hàng ở bảng itemPurchaseOrderDetails.

  + Xóa : thực hiện xóa, nếu ghi nhận nhầm hoặc có sai sót.

  + Tìm kiếm giao dịch nhận hàng

  + In danh sách chi tiết nhận hàng cho một đơn đặt hàng.


* Bảng này sau đó sẽ dùng để theo dõi NHẬP TRƯỚC - XUẤT TRƯỚC.
  Biết được số lượng đã bán ra là của Lô Hàng đã nhận về hôm nào, của đơn đặt hàng nào 
  và tiền vốn tương ứng là bao nhiều ==> từ đó tính ra số tiền lãi hay lỗ khi bán hàng.