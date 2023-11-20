<?php
// require_once PATH_ROOT . 'TCPDF/tcpdf.php';
// require_once PATH_ROOT . 'TCPDF/tcpdi.php';
namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;
// use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;

class InvoiceController extends Controller
{
    public function index(){
        
        //retornar view
        return view("invoices.invoices");
    }
    public function select(){
        //pegar todas as invoices do cliente logado
        $datas = Session::get('email');
        
        $invoices = new Invoice;
        $invoices = $invoices->get_invoices($datas["email"],$datas["senha"],$datas["id"]);
        return $invoices;
    }
    public function download(Request $request){
        $session = Session::get('email');
        $invoices = new Invoice;
        $datas = $invoices->download_invoice($session["email"],$session["senha"],$request->id_invoice);
        // dd($datas[0]["id"]);
        $PATH_PDF = resource_path('pdf_files/template1.pdf');
        $mpdf = new Mpdf;
        $pagecount = $mpdf->SetSourceFile($PATH_PDF);
        for($count = 1; $count <= $pagecount; $count++){
            $tplId = $mpdf->ImportPage($count);
            $mpdf->SetPageTemplate($tplId);
            $mpdf->AddPage();
        }
        $mpdf->SetTitle('Invoice');
        $mpdf->SetXY(180,55);
        $mpdf->WriteHTML($datas[0]["invoice_date_due"]);
        $mpdf->SetXY(43,42);
        $mpdf->WriteHTML("<a style='color: #9DA3AE; font-family:'Microsoft Sans Serif';>Teste</a>");
        $mpdf->SetXY(11,55);
        $mpdf->WriteHTML($datas[0]["invoice_date"]);
        $mpdf->SetXY(14,73);
        $mpdf->WriteHTML("<hr style='border: 1px solid black;'><br>");
        $mpdf->SetXY(15,72);
        $mpdf->WriteHTML("TTRX");
        $mpdf->SetXY(58,72);
        $mpdf->WriteHTML(intval($datas[0]["amount_by_group"][0][5]).".00");
        $mpdf->SetXY(98,66);
        $mpdf->WriteHTML("Price");
        $mpdf->SetXY(90,72);
        $mpdf->WriteHTML($datas[0]["amount_by_group"][0][4]);
        $mpdf->SetXY(130,72);
        $mpdf->WriteHTML($datas[0]["amount_by_group"][0][0]);
        $mpdf->SetXY(185,72);
        $mpdf->WriteHTML("$ ".$datas[0]["amount_untaxed"].".00");
        $mpdf->SetXY(130,91);
        $mpdf->WriteHTML($datas[0]["amount_by_group"][0][0]);
        $mpdf->SetXY(185,84);
        $mpdf->WriteHTML("$".$datas[0]["amount_untaxed"].".00");
        $mpdf->SetXY(185,91);
        $mpdf->WriteHTML("$".$datas[0]["amount_tax"].".00");
        $mpdf->SetXY(185,97);
        $mpdf->WriteHTML("$".$datas[0]["amount_total"].".00");

        $mpdf->Output('nome_qualquer.pdf','D');

        // return ;
    }
}
