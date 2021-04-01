function separateAtThousands(num) {
    var numArray = [],
        numStr = String(num);
    while (num >= 1000) {
      // prepend next set of 3 digits to numArray
      numArray.unshift(Math.round(((num / 1000) - Math.floor(num / 1000)) * 1000));
      // ensure leading 0's are included in numbers like 1,005
      while (String(numArray[0]).length < 3) {
        numArray[0] = '0' + numArray[0];
      }
      // update num so no infinite loop
      num = Math.floor(num / 1000);
    }
    // add last chunk of digits
    numArray.unshift(num);
    return numArray.join(',');
  }

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
                $('.cost, .amount').mask("000,000,000,000,000", {reverse: true});
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
        var idStaff = $(this).children().val();
        $('#id-submit').val(idStaff);
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
        var textShow = $.trim($(this).text());
        $("#supplierId").val(textShow);
        $(".supplier").fadeOut();
        $('#supName').val($(this).children('.supplierName').val());
        $('#supPhone').val($(this).children('.sup-phone').val());
        $('#supEmail').val($(this).children('.sup-email').val());
        $('#supAddress').val($(this).children('.sup-address').val());
        $('#supCity').val($(this).children('.sup-city').val());
        $('#supCounty').val($(this).children('.sup-county').val());
        $('#supId-submit').val($(this).children('.sup-id').val())
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
            var staffId = $('#id-submit').val();
            var paymentTermId =$('#paymentTermId').val();
            var supplierId = $('#supId-submit').val();
            var billingStatus = $('#billingStatus').text();
            var totalAmount = parseFloat($('#totalAmount').val().replace(/,/g, ''));
            var orderRemark = $('#orderRemark').val();
            var detail = [];
            $("tbody.data_content tr").each(function () {
                var id = $(this).attr('items-id');
                var quantity = $(this).find('.quantity').val();
                var amount = parseFloat($(this).find('.amount').val().replace(/,/g, ''));
                var cost = parseFloat($(this).find('.cost').val().replace(/,/g, ''));
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
            var staffId = $('#id-submit').val();
            var paymentTermId =$('#paymentTermId').val();
            var supplierId = $('#supId-submit').val();
            var billingStatus = $('#billingStatus').text();
            var totalAmount = parseFloat($('#totalAmount').val().replace(/,/g, ''));
            var orderRemark = $('#orderRemark').val();
            var detail = [];
            $("tbody.data_content tr").each(function () {
                var id = $(this).attr('items-id');
                var quantity = $(this).find('.quantity').val();
                var amount = parseFloat($(this).find('.amount').val().replace(/,/g, ''));
                var cost = parseFloat($(this).find('.cost').val().replace(/,/g, ''));
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
        var cost = parseInt($row.find('.cost').cleanVal());
        if(isNaN(cost)) {
            var answer = quantity;
        } else {
            answer = quantity * cost;
        }
        answer = separateAtThousands(answer);
        $row.find('.amount').val(answer);
    });

    $(document).on('keyup','#thetable input.amount',function(){
        var $row = $(this).closest('tr');
        $row.find('.cost').val(0);
        var quantity = parseInt($row.find('.quantity').val());
        var amount = parseInt($row.find('.amount').cleanVal());
        if(isNaN(amount)) {
            var answer = quantity;
        } else {
            answer = Math.round( amount / quantity);
        }
        answer = separateAtThousands(answer);
        $row.find('.cost').val(answer);
    });


    

    var totalAmount = function() {
        var sum = 0;
        $('.amount').each(function() {
            var num = $(this).val();
            num = num.replace(/,/g, '');
            if(num !== 0 && num != '') {
                sum += parseFloat(num);
            } else {
                sum = 0;
            }
        });
        sumFormat = separateAtThousands(sum);
        $('#totalAmount').val(sumFormat);        
    }

    

    $(document).on('keyup','#thetable input.quantity, #thetable input.cost,#thetable input.amount',function() {
        totalAmount();
    });
});





