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
        $products = $invoices->get_products_invoices($session['email'],$session["senha"],$request->id_invoice);
        // dd($products);
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
        $mpdf->SetXY(98,66);
        $mpdf->WriteHTML("Price");
        $mpdf->SetXY(11,55);
        $mpdf->WriteHTML($datas[0]["invoice_date"]);
        $this->add_line_pdf($mpdf,$datas,$products);
        $mpdf->Output('nome_qualquer.pdf','D');

        // return ;
    }

    private function subtotal_line($mpdf,$y,$datas){
        $mpdf->setXY(130,$y);
        $mpdf->writeHTML("<hr style='height: 1.01vh; margin: 0; border: 1px'/>");
        $mpdf->setXY(130,$y-6);
        $mpdf->writeHTML("Subtotal");
        $mpdf->SetXY(130,$y+3);
        $mpdf->WriteHTML($datas[0]["amount_by_group"][0][0]);//Tax
        $mpdf->SetXY(185,$y+3);
        $mpdf->WriteHTML("$".$datas[0]["amount_tax"]);//Taxa valor
        $mpdf->SetXY(185,$y-4);
        $mpdf->WriteHTML("$".$datas[0]["amount_untaxed"]);//Amount
        $mpdf->SetXY(130,$y+8);
        $mpdf->WriteHTML("Total");
        $mpdf->SetXY(185,$y+8);
        $mpdf->WriteHTML("$".$datas[0]["amount_total"]);//Total com a taxa
    }


    private function add_line_pdf($mpdf,$datas,$products){
        $y = 72;
        $line = 73;
        foreach($products as $product){
            // dd($product);
            
            $mpdf->SetXY(14,$line);
            $mpdf->WriteHTML("<hr style='border: 1px solid black;'><br>");
            $mpdf->SetXY(15,$y);
            $mpdf->WriteHTML($product["product"]);//description
            $mpdf->SetXY(58,$y);
            $mpdf->WriteHTML($product["quantity"]);//Quantidade
            $mpdf->SetXY(90,$y);
            $mpdf->WriteHTML($product["price_unit"]);//unitPrice
            $mpdf->SetXY(130,$y);
            $mpdf->WriteHTML($datas[0]["amount_by_group"][0][0]);//taxa15%
            $mpdf->SetXY(185,$y);
            $mpdf->WriteHTML("$ ".$product["subtotal"].".0");//valor sem taxa
            $y += 5;
            $line += 5;
        }
        $y+=7;
        $this->subtotal_line($mpdf,$y,$datas);
    }
}
