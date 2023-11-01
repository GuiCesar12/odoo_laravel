<?php

namespace App\Http\Controllers;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;
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
}
