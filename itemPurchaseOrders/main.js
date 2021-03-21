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
            var id = $(this).children().val();
            $.post("./PHP_Items/add-items-to-order.php", {id: id}, function (data) {
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

    // Search Staff
    $("#staffId").keyup(function() {
        var key = $(this).val();
        if(key != "") {
            $(".staff").fadeIn();
            $.post("./PHP_Items/search-staff.php", {keySearch: key}, function(data) {
            $(".staff-list").html(data);
            });
        } else {
            $(".staff-list").html("");
            $(".staff").fadeOut();
        }
    });

    $(document).on("click",".staff-items",function() {
        $("#staffId").val($(this).text());
        //var a = $('#staff--id').val();
        //alert(a)
        $(".staff").fadeOut();
        
    });



    //Search Supplier
    $("#supplierId").keyup(function() {
        var key = $(this).val();
        if(key != "") {
            $(".supplier").fadeIn();
            $.post("./PHP_Items/search-supplier.php", {keySearch: key}, function(data) {
            $(".supplier-list").html(data);
            });
        } else {
            $(".supplier-list").html("");
            $(".supplier").fadeOut();
        }
    });

    $(document).on("click",".supplier-items",function() {
        $("#supplierId").val($(this).text());
        $(".supplier").fadeOut();
        $('#supName').val($('#supplierName').val());
        $('#supPhone').val($('#sup-phone').val());
        $('#supEmail').val($('#sup-email').val());
        $('#supAddress').val($('#sup-address').val());
        $('#supCity').val($('#sup-city').val());
        $('#supCounty').val($('#sup-county').val());
    });



    // ADD ORDER => STATUS = "OPEN"
    $("#add-orders").click(function() {
        if ($("#poNumber").val() == "")
            alert('Please fill the required field');
        else if ($("#receiveDate").val() == "")
            alert('Please fill the required field')
        else if ($("#staffId").val() == "")
            alert('Please fill the required field')
        else if ($("#supplierId").val() == "")
            alert('Please fill the required field') 
        else {
            // Lấy dữ liệu từ textbox input
            if ($("#orderDate").val() == "") {
                var a = $("#orderDate").datetimepicker('getValue');
                var orderDate = a.getUTCFullYear() +"/"+ (a.getUTCMonth()+1) +"/"+ a.getUTCDate() + " " + a.getHours() + ":" + a.getMinutes() + ":" + a.getSeconds();
            } else orderDate = $("#orderDate").val();
            var receiveDate = $("#receiveDate").val();
            var poNumber = $("#poNumber").val();
            var status = 'OPEN';
            var staffId = $('#staff--id').val();
            var paymentTermId =$('#paymentTermId').val();
            var supplierId = $('#sup-id').val();
            var billingStatus = $('#billingStatus').text();
            var totalAmount = $('#totalAmount').val();
            var orderRemark = $('#orderRemark').val();
            var detail = [];
            $("tbody.data_content tr").each(function () {
                var id = $(this).attr('items-id');
                var quantity = $(this).find('.quantity').val();
                var amount = $(this).find('.amount').val();
                var cost = $(this).find('.cost').val();
                detail.push(
                    {
                        id: id, 
                        quantity: quantity,
                        cost: cost,
                        amount: amount
                    }
                );
            });

            if (detail.length!=0) {
                var orders = {
                    orderDate:orderDate,
                    receiveDate:receiveDate,
                    poNumber:poNumber,
                    status: status,
                    staffId: staffId,
                    paymentTermId:paymentTermId,
                    supplierId:supplierId,
                    billingStatus:billingStatus,
                    totalAmount:totalAmount,
                    orderRemark:orderRemark,
                    detailorder:detail
                }
                // console.log(orders);
                $.post("./PHP_Items/find-sup.php", {orders: orders}, function (data) {
                    alert(data);
                });
            };
            window.location.href='index.php?page_layout=list-orders';
        };
        
    });

    // SAVE ORDER => STATUS = PENDING

    $("#save-order").click(function() {
        if ($("#poNumber").val() == "")
            alert('Please fill the required field');
        else if ($("#receiveDate").val() == "")
            alert('Please fill the required field')
        else if ($("#staffId").val() == "")
            alert('Please fill the required field')
        else if ($("#supplierId").val() == "")
            alert('Please fill the required field') 
        else {
            // Lấy dữ liệu từ textbox input
            if ($("#orderDate").val() == "") {
                var a = $("#orderDate").datetimepicker('getValue');
                var orderDate = a.getUTCFullYear() +"/"+ (a.getUTCMonth()+1) +"/"+ a.getUTCDate() + " " + a.getHours() + ":" + a.getMinutes() + ":" + a.getSeconds();
            } else orderDate = $("#orderDate").val();
            var receiveDate = $("#receiveDate").val();
            var poNumber = $("#poNumber").val();
            var status = 'PENDING';
            var staffId = $('#staff--id').val();
            var paymentTermId =$('#paymentTermId').val();
            var supplierId = $('#sup-id').val();
            var billingStatus = $('#billingStatus').text();
            var totalAmount = $('#totalAmount').val();
            var orderRemark = $('#orderRemark').val();
            var detail = [];
            $("tbody.data_content tr").each(function () {
                var id = $(this).attr('items-id');
                var quantity = $(this).find('.quantity').val();
                var amount = $(this).find('.amount').val();
                var cost = $(this).find('.cost').val();
                detail.push(
                    {
                        id: id, 
                        quantity: quantity,
                        cost: cost,
                        amount: amount
                    }
                );
            });

            if (detail.length!=0) {
                var orders = {
                    orderDate:orderDate,
                    receiveDate:receiveDate,
                    poNumber:poNumber,
                    status: status,
                    staffId: staffId,
                    paymentTermId:paymentTermId,
                    supplierId:supplierId,
                    billingStatus:billingStatus,
                    totalAmount:totalAmount,
                    orderRemark:orderRemark,
                    detailorder:detail
                }
                // console.log(orders);
                $.post("./PHP_Items/find-sup.php", {orders: orders}, function (data) {
                    alert(data);
                });
            };
            window.location.href='index.php?page_layout=list-orders';
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


    

    var totalAmount = function() {
        var sum = 0;
        $('.amount').each(function() {
            var num = $(this).val();
            if(num !== 0) {
                sum += parseFloat(num);
            }
        });
        $('#totalAmount').val(sum);
    }

    $(document).on('keyup','#thetable input.quantity, #thetable input.cost,#thetable input.amount',function() {
        totalAmount();
    });

    $('#add-orders').click(function() { 
        
      });




});





