<?php
    require '../pdflib/tfpdf.php';
    require('../pdflib/makefont/makefont.php');
    $connect = new mysqli("localhost","root","Thanhphuc3010@","ptweb002");
    //MakeFont('../pdflib/font/unifont/times.ttf','cp1258');
    class pdf extends tFPDF {
        function header() {
            // $this->Image('../assets/img/logo.png',10,6);
            $this->SetFont('Arial','B',14);
            $this->Cell(276,5,'LIST ITEMS',0,0,'C');
            $this->Ln();
            $this->AddFont('Timeroman','','times.ttf',true);
            $this->SetFont('Timeroman','',10);
            $this->Cell(276,10,'Danh sách các mặt hàng',0,0,'C');
            $this->Ln(20);
        }

        function footer() {
            $this->SetY(-15);
            $this->SetFont('Arial','',8);
            $this->Cell(0,10,'Pages'.$this->PageNo().'/{nb}',0,0,'C');
        }

        function headerTable() {
            $this->Cell(26,10,'Mã sản phẩm',1,0,'C');
            $this->Cell(100,10,'Tên sản phẩm',1,0,'C');
            $this->Cell(30,10,'Màu sắc',1,0,'C');
            $this->Cell(30,10,'Số lượng',1,0,'C');
            $this->Cell(30,10,'Đang đặt',1,0,'C');
            $this->Cell(30,10,'Giá nhập',1,0,'C');
            $this->Cell(30,10,'Giá bán',1,0,'C');
            $this->Ln();
        }

        function viewTable($connect) {
            $sql = "SELECT * FROM items";
            $query = $connect->query($sql); 
            while($row = $query->fetch_assoc()) {
                $this->Cell(26,10,$row['itemNo'],1,0,'C');
                $this->Cell(100,10,$row['itemName'],1,0,'L');
                $this->Cell(30,10,$row['colorId'],1,0,'C');
                $this->Cell(30,10,$row['qty_available'],1,0,'C');
                $this->Cell(30,10,$row['qtyOnOrder'],1,0,'C');
                $this->Cell(30,10,$row['cost'],1,0,'C');
                $this->Cell(30,10,$row['price'],1,0,'C');
                $this->Ln();
                }
            }
        }

    $pdf = new pdf();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);//Phương thức định nghĩa trang in: L là lancape, khổ giấy A4
    $pdf->headerTable(); 
    $pdf->viewTable($connect);
    $pdf->Output('I','listitem');
?>