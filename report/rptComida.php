<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/comida/config/global.php");
require_once(ROOT_DIR . "/model/ComidaModel.php");
require(ROOT_CORE . '/fpdf/fpdf.php');

class PDF extends FPDF
{
    function convertxt($p_txt)
    {
        return iconv('UTF-8', 'iso-8859-1', $p_txt);
    }

    function Header()
    {
        // Logo
        $this->Image(ROOT_DIR . '/public/images/indonesia.png', 10, 6, 30);
        $this->SetFont('Arial', 'B', 25);
        $this->Cell(0, 15, "Reporte Individual de Comida de Mexico", 0, 1, 'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->setFont('Arial', 'I', 8);
        $this->Cell(0, 10, $this->convertxt("Página ") . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    function TableTitle()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, "Detalles de la Comida", 0, 1, 'C');
        $this->Ln(5);
    }

    function FancyTable($header, $data)
    {
        $this->SetFillColor(200, 220, 255);
        $this->SetTextColor(0);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 12);
        
        $widths = array(10, 30, 25, 15, 20, 20, 25, 70, 30, 30); 
        foreach ($header as $i => $col) {
            $this->Cell($widths[$i], 9, $col, 1, 0, 'C', true);
        }
        $this->Ln();
        
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 10);
        
        $fill = false;
        foreach ($data as $row) {
            $this->Cell($widths[0], 8, $this->convertxt($row['id']), 1, 0, 'C', $fill);
            $this->Cell($widths[1], 8, $this->convertxt($row['ci_nombre']), 1, 0, 'L', $fill);
            $this->Cell($widths[2], 8, $this->convertxt($row['ci_tipo']), 1, 0, 'L', $fill);
            $this->Cell($widths[3], 8, $this->convertxt($row['ci_precio']), 1, 0, 'C', $fill);
            $this->Cell($widths[4], 8, $this->convertxt($row['ci_region']), 1, 0, 'L', $fill);
            $this->Cell($widths[5], 8, $this->convertxt($row['ci_calorias']), 1, 0, 'C', $fill);
            $this->Cell($widths[6], 8, $this->convertxt($row['ci_estado']), 1, 0, 'L', $fill);
            $this->Cell($widths[7], 8, $this->convertxt($row['ci_descripcion']), 1, 0, 'L', $fill);
            $this->Cell($widths[8], 8, $this->convertxt($row['ci_popularidad']), 1, 0, 'C', $fill);
            $this->Cell($widths[9], 8, $this->convertxt($row['ci_comentarios']), 1, 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }
    }
}

$rpt = new ComidaModel();
$id = $_GET['cliente_id'];
$records = $rpt->findID($id);
$records = $records['DATA'];

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage("L");
$pdf->TableTitle();

// Cabecera
$header = array("No.", "Nombre", "Tipo", "Precio", "Region", "Calorias", "Estado", "Descripción", "Popularidad", "Comentarios");

$pdf->FancyTable($header, $records);

$pdf->Output();
?>
