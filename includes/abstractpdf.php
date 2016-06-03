<?php 
require('fpdf.php'); 

//create a FPDF object
$pdf=new FPDF();

//set document properties
$pdf->SetAuthor('Test');
$pdf->SetTitle('abstract test');

//set font for the entire document
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(50,60,100);

//set up a page
$pdf->AddPage('P'); 

//display the title with a border around it
$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(100,10,'FPDF Tutorial',1,0,'C',0);

//Set x and y position for the main text, reduce font size and write content
$pdf->SetXY (10,50);
$pdf->SetFontSize(10);
$pdf->Write(5,'Congratulations! You have generated a PDF.');

//Output the document
$pdf->Output('example1.pdf','I'); 
?>