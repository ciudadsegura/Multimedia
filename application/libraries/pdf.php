<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf/fpdf.php";
 
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Cell(190,275,'',1,0);
            $this->Image(base_url().'assets/imagenes/telmex_logo.JPG',12,12,45);
            $this->Ln('5');
            $this->SetFont('Arial','B',13);
            $this->Cell(30);
            $this->Cell(120,8,utf8_decode('Proyecto Ciudad Segura'),0,0,'C');
            $this->Ln('5');
            $this->SetFont('Arial','',11);
            $this->Ln('5');
            $this->Cell(30);
            $this->Cell(120,8,utf8_decode('REPORTE GRAFICO DE DAÑOS OCASIONADOS POR TERCEROS'),0,0,'C');
            $this->SetFont('Arial','',7);
            $this->Ln('15');
            $this->SetFillColor(11,58,154);
            $this->SetTextColor(240,255,240);
            $this->Cell(2,4,utf8_decode(''),0,0,'C');
            $this->Cell(25,4,utf8_decode('FOLIO'),1,0,'C',true);
            //$this->SetTextColor(9,9,9);
            $this->SetFillColor(100,3,3);
            $this->Cell(40,4,utf8_decode('RDSTVPCS_4891'),1,0,'C',true);
            $this->Ln(6);
            $this->SetFillColor(11,58,154);
            $this->SetTextColor(240,255,240);
            $this->Cell(2,4,utf8_decode(''),0,0,'C');
            $this->Cell(25,4,utf8_decode('TICKET'),1,0,'C',true);
            $this->SetTextColor(9,9,9);
            $this->SetFillColor(100,3,3);
            $this->Cell(40,4,utf8_decode('901286'),1,0,'C',false);
            $this->Ln(6);
            $this->SetFillColor(11,58,154);
            $this->SetTextColor(240,255,240);
            $this->Cell(112,4,utf8_decode(''),0,0,'C');
            $this->Cell(36,10,utf8_decode('FECHA REPORTE GRAFICO'), 1,0, 'C', true);
            $this->SetTextColor(9,9,9);
            $this->Cell(40,10,utf8_decode('Sábado, 07 de mayo de 2016'),1,0,'C');
            $this->Ln(4);
            $this->SetTextColor(240,255,240);
            $this->Cell(2,4,utf8_decode(''),0,0,'C');
            $this->Cell(25,6,utf8_decode('ID STV'),1,0,'C',true);
            $this->SetFont('Arial','B',11);
            $this->SetTextColor(9,9,9);
            $this->Cell(40,6,utf8_decode('888'),1,0,'C');
            $this->SetFont('Arial','',7);
            $this->SetTextColor(240,255,240);
            $this->Ln(8);
            $this->Cell(2,4,utf8_decode(''),0,0,'C');
            $this->Cell(25,10,utf8_decode('DOMICILIO'),1,0,'C',true);
            $this->SetFont('Arial','',6);
            $this->SetTextColor(9,9,9);
            $this->MultiCell(60,5,utf8_decode('CIRCUITO INTERIOR RIO CHURUBUSCO Esq. AVENA COL. GRANJAS MEXICO, DEL. IZTACALCO, CP 08400'), 1, 'C', false);
            $this->SetFont('Arial','',7);
            $this->Ln(-10);
            $this->SetTextColor(240,255,240);
            $this->Cell(110,4,utf8_decode(''),0,0,'C');
            $this->Cell(2,4,utf8_decode(''),0,0,'C');
            $this->Cell(36,10,utf8_decode('AREA QUE REPORTA DAÑOS'), 1,0, 'C', true);
            $this->SetTextColor(9,9,9);
            $this->Ln(-0);            
            $this->Cell(148,4,utf8_decode(''),0,0,'C');
            //$this->Cell(2,4,utf8_decode(''),0,0,'C');
            $this->Cell(40,10,utf8_decode('AREA QUE REPORTA DAÑOS'), 1,0, 'C');
            $this->Image(base_url().'assets/imagenes/case.JPG',158,64,40);
            $this->Ln(12);
            $this->SetTextColor(240,255,240);
            $this->Cell(112,4,utf8_decode(''),0,0,'C');
            //$this->Cell(40,5,utf8_decode('PERSONAL REALIZA REPORTE GRAFICO'), 1,0, 'C', true);
            $this->MultiCell(36,5,utf8_decode('PERSONAL REALIZA REPORTE GRAFICO'), 1, 'C', true);
            $this->SetTextColor(9,9,9);
            $this->Ln(-10);
            $this->Cell(148,4,utf8_decode(''),0,0,'C');
            $this->SetFont('Arial','',6);
            $this->MultiCell(40,5,utf8_decode('ALFONSO VAZQUEZ / MER GROUP; ATIENDE CANASTILLA LA-47-059'), 1, 'C');
            $this->SetFont('Arial','',7);
            $this->Ln(-6);
            $this->SetTextColor(240,255,240);
            $this->Cell(2,4,utf8_decode(''),0,0,'C');
            $this->Cell(25,6,utf8_decode('AREA TIPO'),1,0,'C',true);
            $this->SetTextColor(9,9,9);
            $this->Cell(60,6,utf8_decode('INCIDENCIA DELICTIVA'),1,0,'C');
            $this->Ln(8);
            $this->SetTextColor(240,255,240);
            $this->Cell(2,4,utf8_decode(''),0,0,'C');
            $this->MultiCell(25,3,utf8_decode('CLASIFICACION OBJETIVO'), 1, 'C', true);
            $this->Ln(-6);
            $this->SetTextColor(9,9,9);
            $this->Cell(27,6,utf8_decode(''),0,0,'C');
            $this->Cell(60,6,utf8_decode('INCIDENCIA DELICTIVA'),1,0,'C');
            //$this->Ln(-2);
            $this->SetTextColor(240,255,240);
            $this->Cell(25,6,utf8_decode(''),0,0,'C');
            $this->Cell(36,6,utf8_decode('TELEFONO'),1,0,'C',true);
            $this->SetTextColor(9,9,9);
            $this->Cell(40,6,utf8_decode('36869500'),1,0,'C');
            $this->Ln(15);
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',7);
           $this->Ln(3);
           $this->Cell(50,4,utf8_decode('DOC. ELABORADO POR EL CASE'),0,0,'L');
           $this->Cell(90,4,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>