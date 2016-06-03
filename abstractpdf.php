<?php
require('fpdf.php');
include 'includes/db_connect.php';

$member_id = $_POST['mid'];
$title = $_POST['abtitle'];
$abstract = $_POST['abtext'];

if ($insert_detail = $mysqli->prepare("INSERT INTO abstract (member_id, title, abstract) VALUES (?, ?, ?)")) {
                $insert_detail->bind_param('iss', $member_id, $title, $abstract );
                // Execute the prepared query.
                if (! $insert_detail->execute()) {
                    header('Location: ../error.php?err=Submit failure: INSERT ABSTRACT');
    				}
    			}
	
	

$a = $mysqli->query("SELECT * FROM abstract where member_id='$member_id'");
$ab = $a->fetch_array();
$abt = $ab['title'];
$abc = $ab['abstract'];		
		
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);


$pdf->SetTitle($abt);
$pdf->MultiCell(189, 8, $abc, 1, 1);
$pdf->Output('uploads/reference/yourfilename.pdf','F');
	
header('Location: ./abstract_success.php');	


?>