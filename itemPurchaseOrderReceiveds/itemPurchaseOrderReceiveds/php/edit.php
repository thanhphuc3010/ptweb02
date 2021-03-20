
 <?php
    $lotId = $_GET['lotId'];
    $sql_up = "SELECT * FROM itempurchaseorderreceiveds WHERE lotId ='$lotId'";
    $query_up = mysqli_query($conn, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['add'])) {

        $lotId = $_POST['lotId'];
        $poLineId = $_POST['poLineId'];
        $receiveDate = $_POST['receiveDate'];
        $amountReceived=$_POST['amountReceived'];
        $qtySold=$_POST['qtySold'];
        $qtyReceiveda=$_POST['qtyReceived'];
        $amountSold=$_POST['amountSold'];
        $notea=$_POST['note'];
        $sql = "UPDATE itempurchaseorderreceiveds SET lotId='$lotId', poLineId='$poLineId', receiveDate='$receiveDate',amountReceived='$amountReceived',qtySold='$qtySold',qtyReceiveda='$qtyReceiveda',amountSold='$amountSold',notea='$notea' WHERE lotId ='$lotId'";

        $query = mysqli_query($conn,$sql);
        header('location: ./index.php?page_layout=list');
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
                                <h1 class="card__title">Chỉnh sửa đơn nhận</h1>
                            </div>
                        </div>
                        <div class="card__body">
                            <form class="row" method="POST" name="received-form" id="received-form" enctype="multipart/form-data">
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                        <input readonly type="text" name="lotId" required value="<?php echo $row_up['lotId'];?>">
                                        <label>Mã đơn <span></span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group">
                                    <input type="number" name="poLineId" required value="<?php echo $row_up['poLineId'];?>">
                                        <label>Mã đơn hàng<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-6 m-12 c-12">
                                    <div class="form-group"> 
                                    <input type="datetime" name="receiveDate" required value="<?php echo $row_up['receiveDate'];?>">
                                        <label>Ngày đặt hàng</label> 
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                    <input type="number" name="qtyReceived" required value="<?php echo $row_up['qtyReceived'];?>">
                                        <label>Số lượng nhận<span>*</span></label>
                                    </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                    <input readonly type="number" name="amountReceived" required value="<?php echo $row_up['amountReceived'];?>">
                                        <label>Tổng tiền nhận<span></span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                    <input type="number" name="qtySold" required value="<?php echo $row_up['qtySold'];?>">
                                        <label>Số lượng bán<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                    <input type="number" name="amountSold" required value="<?php echo $row_up['amountSold'];?>">
                                        <label>Tiền vốn bán<span>*</span></label>
                                    </div>
                                </div>
                                <div class="col l-12 m-12 c-12">
                                    <div class="form-group">
                                    <input type="text" name="note" required value="<?php echo $row_up['note'];?>">
                                        <label>Ghi chú</label>
                                    </div>
                                </div>
                                <div class="col l-2 m-1 c-1">
                                    <div class="backtolist">
                                        <a href="./index.php?page_layout=list"> Quay lại </a>
                                    </div>
                                </div>
                                <div class="col l-12 m-10 c-10">
                                    <button class = "form__button" type="submit" name="add">Lưu thay đổi</button>
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
