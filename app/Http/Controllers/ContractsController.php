<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\Contracts;
class ContractsController extends Controller
{
    public function index(){
        return view('contracts.contracts');
    }
    public function select(){
        $datas = Session::get('email');
        $contracts = new Contracts;
        $contracts = $contracts->get_contracts($datas["email"],$datas["senha"],$datas["id"]);
        return $contracts;
    }

    public function update(Request $request){
        
        // $requests = ["number"=>$request->numero_cartao,"cvv"=>$request->cvv,"nome_cartao"=>$request->nome_cartao,"validade"=>$request->validade];
        $contracts = new Contracts;
        $datas = Session::get('email');
        if($contracts->updateCard($datas["email"],$datas["senha"],$datas["id"],$request) == true){
            return response("Dados bancarios alterados com sucesso",200);
        }

    }
}
