<?php

namespace App\Service;

use Dompdf\Dompdf;

class PdfService
{

   private $domPdf;

    public function __construct()
    {
        $this->domPdf = new DomPdf();
    }


    public function orderToPdf($html,$clientlLastname)
    {
        //$this->domPdf->setPaper([0,0,500,700],'landscape'); 
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        @$this->domPdf->stream('podpis_'.$clientlLastname.'.pdf',[
          "Attachment" => true
        ]);
    }

}