<?php 
session_start();
include ('../config/config.php');
include ('../fpdf.php');
$id = $_GET['id'];

$result=mysql_query("SELECT * FROM payments WHERE payment_id = '$id'") or die(mysql_error());

//Inisiasi untuk membuat header kolom
$CpayId = "";
$CtableId = "";
$Cmenu = "";
$Csubtotal = "";
$Ctax = "";
$Ctotal = "";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
    $payId = $row["payment_id"];
    $tableId = $row["table_id"];
    $menu = $row["menu"];
    $subtotal = $row["subtotal"];
    $tax = $row["tax"] * 100;
    $total = $row["total"];
 
    

    $CpayId = $CpayId.$payId."\n";
    $CtableId = $CtableId.$tableId."\n";
    $Cmenu = $Cmenu.$menu."\n";
    $Csubtotal = $Csubtotal.'$' . $subtotal."\n";
    $Ctax = $Ctax.$tax.'%'."\n";
    $Ctotal = $Ctotal.'$'.$total."\n";
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'Payment Bill',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'Resto Broto',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(25,8,'Payment ID',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(40,8,'Table ID',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(25,8,'Menu',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(25,8,'Subtotal',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(50,8,'Tax',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(35,8,'Total',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,15,$CpayId,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(40,15,$CtableId,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(25,5,$Cmenu,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(25,15,$Csubtotal,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(50,15,$Ctax,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(35,15,$Ctotal,1,'C');

$pdf->Output();
?>