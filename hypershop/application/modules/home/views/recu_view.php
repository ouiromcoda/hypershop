<?php 
$title="";
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
    // we can have any view part here like HTML, PHP etc



$tbl_header = '<table id="example" class="table table-striped table-bordered" cellspadding="10" width="100%" border="1">
            <thead>
                 
              <tr style="font-weight:bold;text-align:center;">
                <th>Description</th>
                <th>Prix unitaire</th>
                <th>Qté</th>
                <th>Montants</th>
              </tr>
            </thead>
            <tbody>';
$tbl_footer = '</tbody></table>';
$tbl ='';
$mt=0;

         

          foreach ($data['UserInvoiceInfo'] as $userInvoiceInfo) {
            //$mt=$mt+$operation->montant_operation;
             $tbl .= '<tr>
                        <td>'.$userInvoiceInfo->pro_title.'</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>';
      
  }


   $tbl .= '<tr><td colspan="4" style="text-align:rigth;"> </td>          </tr>';
ob_end_clean();

$obj_pdf->writeHTML($tbl_header.$tbl.$tbl_footer, true, false, false, false, '');
ob_end_clean();
$obj_pdf->Output('Recu_paiement.pdf', 'I');

 ?> 