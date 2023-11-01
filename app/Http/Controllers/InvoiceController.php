<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;
class InvoiceController extends Controller
{
    public function index(){
        //pegar todas as invoices do cliente logado
        $datas = Session::get('email');
        
        $invoices = new Invoice;
        $invoices = $invoices->get_invoices($datas["email"],$datas["senha"],$datas["id"]);
        
        //retornar view
        return view("invoices.invoices",["invoices"=>$invoices]);
    }
}
