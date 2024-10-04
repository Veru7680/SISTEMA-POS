<?php
require_once "../../modelo/facturaModelo.php";
require_once "../../controlador/facturaControlador.php";
require_once "../../assest/fpdf/fpdf.php";
$id=$_GET["id"];
$factura = ControladorFactura::ctrInfoFactura($id);
$producto=json_decode($factura["detalle"],true);

class PDF extends FPDF{
    function Footer(){
        global $factura;
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode($factura["leyenda"]),0,0,"C");
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();

//encabezado
$pdf->setFont('Arial','B',15);
$pdf->Cell(100,20,"SISTEMA POS",0,1);
$pdf->Line(10,25,180,25);
$pdf->SetFont('Arial','',15);
$pdf->Cell(50,8,"NIT: 87878787",0,0);
$pdf->setx(120);

$pdf->Cell(50,8,"Numero de factura:".$factura['codigo_factura'],0,1);
$pdf->Cell(50,8, utf8_decode("telefono:(591)(76802026)"),0,0);
$pdf->SetX(110);
$pdf->Cell(50,8, utf8_decode("fecha de emision:").$factura['fecha_emision'],0,0);
$pdf->Cell(50,8,"",0,1);
$pdf->Cell(50,8, "Emitido por:".$factura['usuario'],0,1);
$pdf->Cell(50,8, utf8_decode("Direccion:calle 14"),0,1);
$pdf->Cell(50,8,"",0,1);
$pdf->Cell(100,8, "Nombre:".utf8_decode($factura['razon_social_cliente']),0,1);
$pdf->Cell(100,8, "NIT/ CI:".$factura['nit_ci_cliente'],0,1);

$pdf->setFont('Arial','B',12);
$pdf->Cell(120,15,"",0,1);
$pdf->SetX(90);
$pdf->Cell(30,20,"Detalle",0,1,"C");

$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(75, 98,241);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(92,8, utf8_decode("Descripcion"),1,0,"L",true);
$pdf->Cell(22,8, utf8_decode("Cantidad"),1,0,"L",true);
$pdf->Cell(22,8, utf8_decode("P. Unitario"),1,0,"L",true);
$pdf->Cell(22,8, utf8_decode("Descuento"),1,0,"L",true);
$pdf->Cell(22,8, utf8_decode("SubTotal"),1,1,"L",true);


$pdf->setFont('Arial','',10);
$pdf->SetTextColor(0,0,0);

foreach($producto as $value){
//imprimir 
$pdf->Cell(92,8,utf8_decode($value["descripcion"]),1,0,"L");
$pdf->Cell(22,8,utf8_decode($value["cantidad"]),1,0,"L");
$pdf->Cell(22,8,utf8_decode($value["precioUnitario"]),1,0,"L");
$pdf->Cell(22,8,utf8_decode($value["montoDescuento"]),1,0,"L");
$pdf->Cell(22,8,utf8_decode($value["subtotal"]),1,1,"L");
}

$pdf->setFont('Arial','B',10);
$pdf->Cell(158,8,"Subtotal:",1,0);
$pdf->Cell(22,8,$factura["neto"],1,1);




$pdf->Cell(158,8,"Descuento Adicional:",1,0);
$pdf->Cell(22,8,$factura["descuento"],1,1);


$pdf->Cell(158,8,"Total:",1,0);
$pdf->Cell(22,8,$factura["total"],1,1);

$pdf->Output();
?> 