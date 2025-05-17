<?php
require('fpdf/fpdf.php');
require_once('connect.php');

$resumeid=$_GET['resumeid'];
$query="SELECT * FROM finalyearproject.resume_jobseeker where ResumeID=$resumeid";
$params = array($resumeid);
$stmt = sqlsrv_query($connect, $query, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Resume',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF('P', 'mm', 'A4');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 14);

function MultiCellRow($pdf, $data, $width, $height){

    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $maxheight = 0;
    
    for ($i = 0; $i < count($data); $i++) {
        $pdf->MultiCell($width, $height, $data[$i],0,'C');
        if ($pdf->GetY() - $y > $maxheight) $maxheight = $pdf->GetY() - $y;
        $pdf->SetXY($x + ($width * ($i + 1)), $y);
    }
    
    for ($i = 0; $i < count($data); $i++) {
        
        $pdf->Rect($x+$width*$i,$y,$width,$maxheight,);
        $pdf->Line($x + $width * $i, $y, $x + $width * $i, $y + $maxheight);
    
        $pdf->SetXY($x+$i*$width,$y);
        $pdf->MultiCell($width, $height, $data[$i],0,'C');
    }
    
    $pdf->Line($x + $width * count($data), $y, $x + $width * count($data), $y + $maxheight);
    $pdf->Line($x, $y, $x + $width * count($data), $y);
    $pdf->Line($x, $y + $maxheight, $x + $width * count($data), $y + $maxheight);
    
    $pdf->SetY($y+$maxheight);}

$data = [
    "Resume ID",
    $row['ResumeID']
];

MultiCellRow($pdf, $data, 90, 10);

$data = [
    "Name",
    $row['Job_SeekerFullname']
];

MultiCellRow($pdf, $data, 90, 10);


$data = [
    "Education",
    $row['Job_SeekerEducation']
];

MultiCellRow($pdf, $data, 90, 10);


$data = [
    "Language",
    $row['Job_SeekerLanguage']
];

MultiCellRow($pdf, $data, 90, 10);


$data = [
    "Email",
    $row['Job_SeekerEmail']
];

MultiCellRow($pdf, $data, 90, 10);


$data = [
    "Address",
    $row['Job_SeekerAddress']
];

MultiCellRow($pdf, $data, 90, 10);


$data = [
    "Phone",
    $row['Job_SeekerPhone']
];

MultiCellRow($pdf, $data, 90, 10);


$data = [
    "Race",
    $row['Job_SeekerRace']
];

MultiCellRow($pdf, $data, 90, 10);


$data = [
    "Summary",
    $row['Job_SeekerSummary']
];

MultiCellRow($pdf, $data, 90, 10);





$data = [
    "Experience",
    $row['Job_SeekerExperience']
];

MultiCellRow($pdf, $data, 90, 10);


$data = [
    "Skill",
    $row['Job_SeekerSkill']
];

MultiCellRow($pdf, $data, 90, 10);

$pdf->Output();
?>


