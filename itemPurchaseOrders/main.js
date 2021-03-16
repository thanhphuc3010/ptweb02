$(document).ready(function () {

    // Tìm kiếm sản phẩm
    $(".search-products").keyup(function() {
        var txt = $(".search-products").val();
        if(txt != "") {
            $(".dropdown").fadeIn();
            $.post("./PHP_Items/search-items.php", {idd: txt}, function(data) {
            $(".dropdown-list").html(data);
            });
        } else {
            $(".dropdown-list").html("");
            $(".dropdown").fadeOut();
        }
    });

    // Thêm sản phẩm vào table
    $(document).on("click",".dropdown-items",function() {
            var mess = $(".id-products").val()
            $.post("./PHP_Items/add-items-to-order.php", {id: mess}, function (data) {
                $(".data_content").append(data);
            });
            $(".dropdown").fadeOut();
            $(".search-products").val("");
    });

    // Xoá items trong bảng
    $(document).on("click","#btn-delete", function() {
        $(this).closest('tr').remove();
    });


    // Tìm thông tin nhà cung cấP
    $("#supplierName").keyup(function() {
        var spName = $("#supplierName").val();
        $.post("./PHP_Items/find-sup.php",{spName:spName},function() {

        });
    });
    // Add orders
    $("#add-orders").click(function() {
        var orderDate = $("#orderDate").val();
        var receiveDate = $("#receiveDate").val();
        var poNumber = $("#poNumber").val();
        var detail = [];
        $("tbody.data_content tr").each(function () {
            var id = $(this).attr('items-id');
            var value_input = $(this).find('.quantity').val();
            detail.push(
                {id: id, quantity: value_input}
            );
        });

        if (detail.length!=0) {
            var orders = {
                orderDate:orderDate,
                receiveDate:receiveDate,
                poNumber:poNumber,
                detailorder: detail
            }
    
            // console.log(orders);
    
            $.post("./PHP_Items/find-sup.php", {orders: orders}, function (data) {
                alert(data);
            });
        };
    });

    // auto calc value from input: quantity, cost & amount
    $(document).on('keyup','#thetable input.quantity, #thetable input.cost',function(){
        var $row = $(this).closest('tr');
        var quantity = parseInt($row.find('.quantity').val());
        var cost = parseInt($row.find('.cost').val());
        if(isNaN(cost)) {
            var answer = quantity;
        } else {
            answer = quantity * cost;
        }
        $row.find('.amount').val(answer);
    });


    $(document).on('keyup','#thetable input.amount',function(){
        var $row = $(this).closest('tr');
        $row.find('.cost').val(0);
        var quantity = parseInt($row.find('.quantity').val());
        var amount = parseInt($row.find('.amount').val());

        var answer = Math.round( amount / quantity);
        $row.find('.cost').val(answer);
    });
});



