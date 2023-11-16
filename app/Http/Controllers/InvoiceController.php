<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $pdf = Pdf::loadView('invoices.pdf',$datas);
        return $pdf->download('invoices.pdf');
    }
}
