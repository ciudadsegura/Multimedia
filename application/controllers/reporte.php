<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
  class Reporte extends CI_Controller {
   
    public function index()
    {
      // Se carga el modelo alumno
      //$this->load->model('alumno_modelo');
      // Se carga la libreria fpdf
      $this->load->library('pdf');
   
      // Se obtienen los alumnos de la base de datos
     // $alumnos = $this->alumno_modelo->obtenerListaAlumnos();
   
      // Creacion del PDF
   
      /*
       * Se crea un objeto de la clase Pdf, recuerda que la clase Pdf
       * heredó todos las variables y métodos de fpdf
       */
      $this->pdf = new Pdf();
      // Agregamos una página
      $this->pdf->AddPage();
      // Define el alias para el número de página que se imprimirá en el pie
      $this->pdf->AliasNbPages();
   
      /* Se define el titulo, márgenes izquierdo, derecho y
       * el color de relleno predeterminado
       */
      $this->pdf->SetTitle("REPORTE GRAFICO FxT");
      $this->pdf->SetLeftMargin(10);
      $this->pdf->SetRightMargin(10);
      $this->pdf->SetFillColor(200,200,200);
   
      // Se define el formato de fuente: Arial, negritas, tamaño 9
      $this->pdf->SetFont('Arial', '', 7);
      /*
       * TITULOS DE COLUMNAS
       *
       * $this->pdf->Cell(Ancho, Alto,texto,borde,posición,alineación,relleno);
       */
      
      $this->pdf->SetFillColor(234,204,7);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(186,4,utf8_decode('DESCRIPCIÓN GENERAL DEL DAÑO'),1,0,'C',true);
      $this->pdf->Ln(4);
      $this->pdf->SetFont('Arial', '', 5);
      //$this->pdf->Cell(30,10,utf8_decode('07/05/2016_11:43 HRS'),1,0,'C');
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->MultiCell(28,10,utf8_decode('07/05/2016_11:43 HRS'), 1, 'C', false);
      $this->pdf->Ln(-10);
      $this->pdf->Cell(30,10,utf8_decode(''),0,0,'C');
      $this->pdf->MultiCell(158,10,utf8_decode('CASE MANTENIMIENTO NOTIFICA QUE EL STV QUE ESTA INSTALADO EN EL DOMICILIO QUE SE INDICA EN ESTE DOCUMENTO REQUIERE CAMBIO DE INFRAESTRUCTURA'), 1, 'C', false);
      //$this->pdf->Cell(160,10,utf8_decode('CASE MANTENIMIENTO NOTIFICA QUE EL STV QUE ESTA INSTALADO EN EL DOMICILIO QUE SE INDICA EN ESTE DOCUMENTO REQUIERE CAMBIO DE INFRAESTRUCTURA'),1,0,'C');
      $this->pdf->SetFont('Arial', '', 7);
      $this->pdf->Ln(7);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(186,6,utf8_decode('DESCRIPCION DE LAS PARTES DAÑADAS EN EL STV A NIVEL VISUAL'),1,0,'C',true);
      $this->pdf->Ln(8);
      $this->pdf->SetFillColor(11,58,154);
      $this->pdf->SetTextColor(240,255,240);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(45,10,utf8_decode('CABLEADO Y OBRA CIVIL'),1,0,'C',true);
      $this->pdf->Cell(4,10,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(43,10,utf8_decode('POSTE Y BRAZO'),1,0,'C',true);
      $this->pdf->Cell(4,10,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(43,10,utf8_decode('GEPE'),1,0,'C',true);
      $this->pdf->Cell(4,10,utf8_decode(''),0,0,'C');
      //$this->pdf->Cell(43,10,utf8_decode('INTERFON, ALTAVOCES Y CAMARA'),1,0,'C',true);
      $this->pdf->Ln(-0);
      $this->pdf->Cell(145,10,utf8_decode(''),0,0,'C');
      $this->pdf->MultiCell(43,5,utf8_decode(' INTERFON,  ALTAVOCES Y CAMARA'), 1, 'C', true);
     // $this->pdf->Ln(20);
      $this->pdf->SetFont('Arial', '', 5);
      $this->pdf->SetTextColor(9,9,9);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->MultiCell(45,5,utf8_decode('TOMA DE VOLTAJE EN PUNTO DE CONEXIONCON L1 56VCA, L260VCA, L3 61VC, POR LO QUE SE REQUIERE LA PRESENCIA DE IMTSA PARA QUE DETERMINE NUEVO PUNTO DE CONEXION.'), 1, 'C', false);
      $this->pdf->SetFont('Arial', '', 4.5);
      $this->pdf->Ln(-20);
      $this->pdf->Cell(51,10,utf8_decode(''),0,0,'C');
      $this->pdf->MultiCell(43,5,utf8_decode('TOMA DE VOLTAJE EN PUNTO DE CONEXIONCON L1 56VCA, L260VCA, L3 61VC, POR LO QUE SE REQUIERE LA PRESENCIA DE IMTSA PARA QUE DETERMINE NUEVO PUNTO DE CONEXION.'), 1, 'C', false);
      $this->pdf->Ln(-20);
      $this->pdf->Cell(98,10,utf8_decode(''),0,0,'C');
      $this->pdf->MultiCell(43,5,utf8_decode('TOMA DE VOLTAJE EN PUNTO DE CONEXIONCON L1 56VCA, L260VCA, L3 61VC, POR LO QUE SE REQUIERE LA PRESENCIA DE IMTSA PARA QUE DETERMINE NUEVO PUNTO DE CONEXION.'), 1, 'C', false);
      $this->pdf->Ln(-20);
      $this->pdf->Cell(145,10,utf8_decode(''),0,0,'C');
      $this->pdf->MultiCell(43,5,utf8_decode('TOMA DE VOLTAJE EN PUNTO DE CONEXIONCON L1 56VCA, L260VCA, L3 61VC, POR LO QUE SE REQUIERE LA PRESENCIA DE IMTSA PARA QUE DETERMINE NUEVO PUNTO DE CONEXION.'), 1, 'C', false);
      $this->pdf->Ln(6);

      $this->pdf->SetFont('Arial', '', 7);
     // $this->pdf->SetFillColor(11,58,154);
      $this->pdf->SetTextColor(240,255,240);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(186,4,utf8_decode('FOTOGRAFIAS DE LA PARTE DAÑADA'),1,0,'C',true);

      $this->pdf->Image(base_url().'assets/evidencias/ID_POSTE.JPG',12,172,38,25);
      $this->pdf->Image(base_url().'assets/evidencias/BROWSER_INTERCOM.JPG',49,172,37,25);
      $this->pdf->Image(base_url().'assets/evidencias/BROWSER_UPS.JPG',86,172,37,25);
      $this->pdf->Image(base_url().'assets/evidencias/CONECTIVIDAD_INICIAL.JPG',123,172,37,25);
      $this->pdf->Image(base_url().'assets/evidencias/AMPLIFICADOR_OK.JPG',160,172,38,25);

      $this->pdf->Image(base_url().'assets/evidencias/NTU_SIN_ENERGIA.JPG',12,197,38,25);
      $this->pdf->Image(base_url().'assets/evidencias/PING_CAMARA.JPG',49,197,37,25);
      $this->pdf->Image(base_url().'assets/evidencias/STV.JPG',86,197,37,25);
      $this->pdf->Image(base_url().'assets/evidencias/TRAPS_UPS.JPG',123,197,37,25);
      $this->pdf->Image(base_url().'assets/evidencias/UPS_ENERGIZADA.JPG',160,197,38,25);

      $this->pdf->Ln(54);
      $this->pdf->SetFillColor(234,204,7);
      $this->pdf->SetTextColor(9,9,9);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(186,4,utf8_decode('SEGUIMIENTO REQUERIDO'),1,0,'C',true);
      $this->pdf->Ln(6);
      $this->pdf->SetFont('Arial', '', 5);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->MultiCell(186,12,utf8_decode(''), 1, 'C', false);
      $this->pdf->Ln(-12);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->SetTextColor(255,3,3);
      $this->pdf->Cell(2,4,utf8_decode('1)'),0,0,'C');
      $this->pdf->SetTextColor(9,9,9);
      $this->pdf->Cell(184,4,utf8_decode('NOTIFICAR AL AREA DE ATENCION DE FALLAS POR TERCEROS DEL CASE / OBTENER Vo. Bo. DE REPARCION GERENCIA COMERCIAL TELMEX Y EMITIR HOJA DE COSTOS DE LA SOLUCION APLICADA'),0,0,'L');
      $this->pdf->Ln(4);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->SetTextColor(255,3,3);
      $this->pdf->Cell(2,4,utf8_decode('2)'),0,0,'C');
      $this->pdf->SetTextColor(9,9,9);
      $this->pdf->Cell(184,4,utf8_decode('NOTIFICAR A GERENCIA COMERCIAL DE CIUDAD SEGURA DE TELMEX / CLAUDIA RENATA GONZALEZ RIVERA / ENVIAR REPORTE GRAFICO PARA Vo. Bo. DE REPARACION'),0,0,'L');

      $this->pdf->SetFont('Arial', '', 7);
     // $this->pdf->SetFillColor(11,58,154);
      $this->pdf->Ln(12);
      $this->pdf->SetFillColor(11,58,154);
      $this->pdf->SetTextColor(240,255,240);
      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(186,4,utf8_decode('CUMPLIMIENTO DEL PROCESO ACORDADO CON LAS AREAS'),1,0,'C',true);
      $this->pdf->Ln(8);
      //$this->pdf->SetTextColor(9,9,9);

      $this->pdf->Cell(2,4,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(10,4,utf8_decode('ETAPA'),1,0,'C',true);
      $this->pdf->SetFillColor(56,87,7);
      $this->pdf->Cell(40,4,utf8_decode('ACTIVIDAD'),1,0,'C',true);
      $this->pdf->SetFillColor(11,58,154);
      $this->pdf->Cell(20,4,utf8_decode('ESTATUS'),1,0,'C',true);
      $this->pdf->SetFillColor(56,87,7);
      $this->pdf->Cell(45,4,utf8_decode('FECHA Y MEDIO DE NOTIFICACION'),1,0,'C',true);
      $this->pdf->SetFillColor(11,58,154);
      $this->pdf->Cell(71,4,utf8_decode('NOTAS DE SEGUIMIENTO AL PROCESO'),1,0,'C',true);
      $this->pdf->Ln(4);
      $this->pdf->SetFont('Arial', '', 5);

      $this->pdf->SetTextColor(9,9,9);
      $this->pdf->Cell(2,3,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(10,3,utf8_decode('1'),1,0,'C');
      $this->pdf->Cell(40,3,utf8_decode('REALIZAR REPORTE GRAFICO'),1,0,'L');
      $this->pdf->SetFillColor(20,208,44);
      $this->pdf->Cell(20,3,utf8_decode('OK'),1,0,'C',true);
      $this->pdf->Cell(30,3,utf8_decode('02/01/2016'),1,0,'C');
      $this->pdf->Cell(15,3,utf8_decode('CORREO'),1,0,'C');
      $this->pdf->Cell(71,3,utf8_decode(''),1,0,'C');
      $this->pdf->Ln(3);

      $this->pdf->Cell(2,3,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(10,3,utf8_decode('2'),1,0,'C');
      $this->pdf->Cell(40,3,utf8_decode('SOLICITAR Vo. Bo. DE REPARACION'),1,0,'L');
      $this->pdf->SetFillColor(20,208,44);
      $this->pdf->Cell(20,3,utf8_decode('PR'),1,0,'C',true);
      $this->pdf->Cell(30,3,utf8_decode('PROCESO'),1,0,'C');
      $this->pdf->Cell(15,3,utf8_decode('CORREO'),1,0,'C');
      $this->pdf->Cell(71,3,utf8_decode(''),1,0,'C');
      $this->pdf->Ln(3);

      $this->pdf->Cell(2,3,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(10,3,utf8_decode('3'),1,0,'C');
      $this->pdf->Cell(40,3,utf8_decode('RECIBIR Vo. Bo. DE REPARACION'),1,0,'L');
      $this->pdf->SetFillColor(20,208,44);
      $this->pdf->Cell(20,3,utf8_decode('PR'),1,0,'C',true);
      $this->pdf->Cell(30,3,utf8_decode('PROCESO'),1,0,'C');
      $this->pdf->Cell(15,3,utf8_decode('CORREO'),1,0,'C');
      $this->pdf->Cell(71,3,utf8_decode(''),1,0,'C');
      $this->pdf->Ln(3);

      $this->pdf->Cell(2,3,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(10,3,utf8_decode('4'),1,0,'C');
      $this->pdf->Cell(40,3,utf8_decode('EMITIR FECHA PROGRAMADA SOLUCION'),1,0,'L');
      $this->pdf->SetFillColor(20,208,44);
      $this->pdf->Cell(20,3,utf8_decode('PC'),1,0,'C',true);
      $this->pdf->Cell(30,3,utf8_decode('POR CONFIRMAR'),1,0,'C');
      $this->pdf->Cell(15,3,utf8_decode('CORREO'),1,0,'C');
      $this->pdf->Cell(71,3,utf8_decode(''),1,0,'C');
      $this->pdf->Ln(3);

      $this->pdf->Cell(2,3,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(10,3,utf8_decode('5'),1,0,'C');
      $this->pdf->Cell(40,3,utf8_decode('EJECUTAR TRABAJOS DE REPARACION'),1,0,'L');
      $this->pdf->SetFillColor(221,228,159);
      $this->pdf->Cell(20,3,utf8_decode('PENDIENTE'),1,0,'C',true);
      $this->pdf->Cell(30,3,utf8_decode(''),1,0,'C');
      $this->pdf->Cell(15,3,utf8_decode('CORREO'),1,0,'C');
      $this->pdf->Cell(71,3,utf8_decode('CONFIRMAR Vo. Bo. COMERCIAL'),1,0,'C');
      $this->pdf->Ln(3);

      $this->pdf->Cell(2,3,utf8_decode(''),0,0,'C');
      $this->pdf->Cell(10,3,utf8_decode('6'),1,0,'C');
      $this->pdf->Cell(40,3,utf8_decode('EMITIR HOJA COSTOS SOLUCION APLICADA'),1,0,'L');
      $this->pdf->SetFillColor(221,228,159);
      $this->pdf->Cell(20,3,utf8_decode('PENDIENTE'),1,0,'C',true);
      $this->pdf->Cell(30,3,utf8_decode(''),1,0,'C');
      $this->pdf->Cell(15,3,utf8_decode('CORREO'),1,0,'C');
      $this->pdf->Cell(71,3,utf8_decode('ENVIAR HASTA QUE MESA DE AYUDA CONFIRME STV OPERANDO'),1,0,'C');
      $this->pdf->Ln(3);

      // La variable $x se utiliza para mostrar un número consecutivo
      /*$x = 1;
      foreach ($alumnos as $alumno) {
        // se imprime el numero actual y despues se incrementa el valor de $x en uno
        $this->pdf->Cell(15,5,$x++,'BL',0,'C',0);
        // Se imprimen los datos de cada alumno
        $this->pdf->Cell(25,5,$alumno->paterno,'B',0,'L',0);
        $this->pdf->Cell(25,5,$alumno->materno,'B',0,'L',0);
        $this->pdf->Cell(25,5,$alumno->nombre,'B',0,'L',0);
        $this->pdf->Cell(40,5,$alumno->fec_nac,'B',0,'C',0);
        $this->pdf->Cell(25,5,$alumno->grado,'B',0,'L',0);
        $this->pdf->Cell(25,5,$alumno->grupo,'BR',0,'C',0);
        //Se agrega un salto de linea
        $this->pdf->Ln(5);
      }*/
      /*
       * Se manda el pdf al navegador
       *
       * $this->pdf->Output(nombredelarchivo, destino);
       *
       * I = Muestra el pdf en el navegador
       * D = Envia el pdf para descarga
       *
       */
      //$this->pdf->Output();
      $this->pdf->Output("Lista de alumnos.pdf", 'i');
    }
  }