
<?php
    if(isset($_POST['add']))
    {
        $dataInsert = [
            'lotId'             => $_POST['lotId'],
            'poLineId'          => $_POST['poLineId'],
            'receiveDate'       => $_POST['receiveDate'],
            'qtyReceived'       => $_POST['qtyReceived'],
            'amountReceived'    => $_POST['amountReceived'],
            'qtySold'           => $_POST['qtySold'],
            'amountSold'        => $_POST['amountSold'],
            'note'              => $_POST['note']
        ];

        if(!insertToDB($dataInsert)){
            var_dump($conn->error);die;
        }
    }
?>
<div class="wrapper">
    <?php
        get_header();
    ?>
    <div class="app">
        <div class="grid wide card">
            <div class="card__container">
                <div class="row">
                    <div class="col l-12 m-12 c-12">
                        <div class="row">
                            <div class="card__header col l-12 m-12 c-12">
                                <h1 class="card__title">Tạo mới đơn nhận</h1>
                            </div>
                        </div>
                        <div class="card__body">
                            <form class="row" method="POST" name="received-form" id="received-form" enctype="multipart/form-data">
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="lotId" required>
                                        <label>Mã đơn <span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input type="text" name="poLineId" required>
                                        <label>Mã đơn hàng<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group"> 
                                        <input type="datetime-local" name="receiveDate" > 
                                        <label>Ngày đặt hàng</label> 
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number" name="qtyReceived" required>
                                        <label>Số lượng nhận<span>*</span></label>
                                    </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number" name="amountReceived" required>
                                        <label>Tổng tiền nhận<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number" name="qtySold">
                                        <label>Số lượng bán<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <input type="number" name="amountSold" >
                                        <label>Tiền vốn bán<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                        <textarea rows="6" name="note"></textarea>
                                        <label>Ghi chú</label>
                                    </div>
                                </div>
                                <div class="col l-2 m-1 c-1">
                                    <div class="backtolist">
                                        <a href="./index.php?page_layout=list"> Quay lại </a>
                                    </div>
                                </div>
                                <div class="col l-12 m-10 c-10">
                                    <button class = "form__button" type="submit" name="add">Thêm đơn nhận</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

   
<script >
    document.getElementById("btn_lang").addEventListener("click",function()
    {
        var drbox = document.getElementById("dropbox");
        if (drbox.style.display == "block")
        {
            drbox.style.display = "none";
        }
        else 
        {
            drbox.style.display = "block";
        }
    })
</script>
