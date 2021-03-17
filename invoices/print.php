<?php
function fetch_data()
{
    $output='';
    $conn= mysqli_connect("localhost","root","giang123456");
    $sql_pdf="SELECT * FROM pdf_export ";
    $result = mysqli_query($conn,$sql_pdf);
    while($row=mysqli_fetch_array($result))
    {
        printf ("%s (%s)\n",$row["invoiceId"],$row["title"],$row["invoiceDate"],$row["reservedDate"],$row["soldDate"],$row["custId"],$row["status"],$row["notes"],$row["amountDue"]);
        
    }

    return $output;
}
if(isset($_POST["generate_pdf"]))
{
    require_once('tcpdf/tcpdf.php');
    $obj_pdf=new TCPDF("P",PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle("Generate HTML Table Data To PDF");
    $obj_pdf->SetHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
    $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
    $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT,'10',PDF_MARGIN_RIGHT);
    $obj_pdf->SetPrintHeader(false);
    $obj_pdf->SetPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE,10);
    $obj_pdf->SetFont('helvetica','',11);
    $obj_pdf->AddPage();
    $content ='';
    $content .='
    <h4 align="center">Generate HTML Table Data To PDF</h4><br />
    <table border="1" cellspacing="0" cellpadding="3">
    <tr>
        <th width="5%">invoiceID</th>
        <th width="15%">title</th>
        <th width="10%">invoiceDate</th>
        <th width="10%">reservedDate</th>
        <th width="10%">soldDate</th>
        <th width="10%">custId</th>
        <th width="10%">soldBy</th>
        <th width="10%">status</th>
        <th width="10%">notes</th>
        <th width="10%">amountDue</th>
    </tr>
';
    $content .= fetch_data();
    $content .='</table';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('file.pdf','I');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Generate HTML Table Data to PDF</title>
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <br/>
        <div class="container">
            <h4 style="text-align:center;"> Generate HTML Table Data to PDF</h4> <br />
            <div class="table-responsive">
                <div class="col-md-12" style="text-align:right;">
                    <form method="post">
                        <input type="submit" name="generate_pdf" class="btn btn-success" value="Generate PDF" />
                    </form>
                </div>
                <br/>
                <br/>
                <table class="table table-bordered">
                    <tr>
                        <th width="5%">invoiceID</th>
                        <th width="15%">title</th>
                        <th width="10%">invoiceDate</th>
                        <th width="10%">reservedDate</th>
                        <th width="10%">soldDate</th>
                        <th width="10%">custId</th>
                        <th width="10%">soldBy</th>
                        <th width="10%">status</th>
                        <th width="10%">notes</th>
                        <th width="10%">amountDue</th>
                    </tr>
                    <?php
                        echo fetch_data();
                    ?>
                </table>
            </div>
        </div>
    
</body>
</html>