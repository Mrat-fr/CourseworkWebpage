<?php
require('../PDF/fpdf.php');
class PDF extends FPDF {
    // Simple table
    function BasicTable($header, $data)
    {
        $this->SetFont('Arial','B',12);
        // Header
        foreach($header as $col){
            $this->Cell(38,7,$col,1);
        }
        $this->Ln(); //new line after print the header

        $this->SetFont('Arial','',12);
        // Data
        foreach($data as $row)  
        {
            foreach($row as $col)
                $this->Cell(38,7,$col,1);
            $this->Ln();
        }

    }
}

$db = new SQLite3('C:\xampp\data\ABCDATABASE.db');

$sql = "SELECT ApplicationID, Password, Product, ApplicationStatus, ApplicationDate FROM users";
$stmt = $db->query($sql);

while($row=$stmt->fetchArray(SQLITE3_NUM)){

    $res [] = $row;

}

$pdf = new PDF(); //create an object of PDF
$pdf->SetFont('Arial','B',12);

$pdf->AddPage();
$pdf->Cell(60,25,'List of Users');
$pdf->Ln(25);
$pdf->SetFont('Arial','',12);
$header = array("ApplicationID", "Password", "Product", "ApplicationStatus", "ApplicationDate");

$pdf->BasicTable($header,$res);
$pdf->Output();

