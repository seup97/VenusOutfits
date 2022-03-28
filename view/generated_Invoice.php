 <?php

 ///  include fpdf library

include '../commons/fpdf181/fpdf.php'; 
include '../model/product_model.php';
include '../model/stock_model.php';

$productObj = new Product();
$stockObj = new Stock();

$date=date("Y-m-d");

$productResult= $productObj->getAllProducts();

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$pdf->SetFont("Arial","B",16);  /// Setting Fonts
$pdf->Image("../images/iconset/venusOutfits1.png", 5,15, 20, 20);

$pdf->Cell(0,20,"CLOTHING STORE MANEGEMENT SYSTEM",0,1,"C");


$pdf->SetFont('Arial','B',20);

$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(59 ,5,'Invoice',0,0);
$pdf->Cell(59 ,10,'',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'Billing Address',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Details',0,1);

$pdf->SetFont('Arial','',10);

$pdf->Cell(130 ,5,'Near DAV',0,0);
$pdf->Cell(25 ,5,'Customer ID:',0,0);
$pdf->Cell(34 ,5,'0012',0,1);

$pdf->Cell(130 ,5,'Delhi, 751001',0,0);
$pdf->Cell(25 ,5,'Invoice Date:',0,0);
$pdf->Cell(34 ,5,$date,0,1);
 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Invoice No:',0,0);
$pdf->Cell(34 ,5,'ORD001',0,1);


$pdf->SetFont('Arial','B',15);
$pdf->Cell(130 ,5,'Shipping Address',0,0);
$pdf->Cell(200 ,10,'ORD001',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189 ,10,'',0,1);


     
$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
$pdf->Cell(10 ,6,'#',1,0,'C');
$pdf->Cell(70 ,6,'Description',1,0,'C');
$pdf->Cell(23 ,6,'Qty',1,0,'C');
$pdf->Cell(30 ,6,'Unit Price',1,0,'C');
$pdf->Cell(30 ,6,'Delivery Fee',1,0,'C');
$pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);

while($productrow=$productResult->fetch_assoc())
{
    $i=0;
    $product_id=$productrow["product_id"];
    
     $tot_qty=  $stockObj->getProductStock($product_id);

$pdf->Cell(10 ,6,$i++,1,0);
$pdf->Cell(70 ,6,$productrow["product_name"],1,0);
$pdf->Cell(23 ,6,$productrow["brand_name"],1,0,'R');
 $pdf->Cell(30 ,6,$productrow["brand_name"],1,0,'R');
$pdf->Cell(30 ,6,$productrow["brand_name"],1,0,'R');
$pdf->Cell(25 ,6,$productrow["brand_name"],1,1,'R');
}
    
$pdf->Cell(108 ,6,'',0,0);
$pdf->Cell(25 ,6,'Subtotal',0,0);
$pdf->Cell(55 ,6,'151000.00',1,1,'R');

$pdf->SetFont("Arial","",8);  /// Setting Fonts  
$pdf->Cell(200,10,"This is a computer generated document and requires no aurgorized signature",0,1,"L");
$dateTime=date("Y-m-d H:i:s");
$pdf->Cell(200,10,"Generated on: $dateTime",0,1,"L");

$pdf->Output();

?>
    