
<?php

require('fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('https://i.pinimg.com/originals/56/14/e8/5614e87424dcb5de2688921b1336635a.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',9);
    // Movernos a la derecha
    $this->Cell(50);
    // Título
    $this->setTextColor(52, 73, 94);
    $this->Cell(100,10,'Empresas dedicada a venta articulos',0,0,'C');
    $this->Ln(10);
     $this->Cell(200,20,'Detalle factura',0,0,'C');
    // Salto de línea
    $this->Ln(30);
    $this->setTextColor(41, 128, 185);
   $this->Cell(38,10, '# Detalle',1,0, 'C',0);
   $this->Cell(38,10,  '# Factura',1,0, 'C',0);
   $this->Cell(38,10,  'cantidad',1,0, 'C',0);
   $this->Cell(38,10,  'precio',1,0, 'C',0);
   $this->Cell(38,10,  '# producto',1,1, 'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    $this->Cell(-80,10,'Integrantes: Edna, Andres, Mateo ,Muricio y John ',0,1,'C');
    

}
}

require 'cn.php';
$consulata = "SELECT * FROM detalle";
$resultado = $mysqli->query($consulata);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',11);



while($row = $resultado->fetch_assoc()) {
   $pdf->Cell(38,10, $row['num_detalle'],1,0, 'C',0);
   $pdf->Cell(38,10, $row['num_factura'],1,0, 'C',0);
   $pdf->Cell(38,10, $row['catidad'],1,0, 'C',0);
   $pdf->Cell(38,10, $row['precio'],1,0, 'C',0);
   $pdf->Cell(38,10, $row['id_producto'],1,1, 'C',0);

}

$pdf->Output();
?>