<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Contracts extends Invoice
{
    use HasFactory;

    public function get_contracts($user,$pass,$id){
        $newid = $this->get_id_contact_user($user,$pass,$id);
        $run = shell_exec("python3 python_scripts/contracts.py " . $user . " " . $pass." ".$newid." 2>&1");
        $result = json_decode($run,true);
        return $result;
    }
    public function updateCard($user,$pass,$id,$request){
        if($this->validate_card($request) == false){
            return response("Cartão invalido",400);
        }
        $requests = $this->request_to_array($request);
        list($mes,$ano) = explode('/',$requests["validade"]);
        $run = shell_exec("python3 python_scripts/update_payments.py " . $user . " " . $pass." ".intval($requests["id_contrato"])." ".$requests["numero_cartao"]." ".$requests["cvv"]." ".trim($requests["nome_cartao"])." ".$mes." ".$ano." 2>&1");
        if($run == null){
            return response("Erro ao alterar dados do cartão",400);
        }
        return true;

    }
    private function request_to_array($request){
        $requests = ["id_contrato"=>$request->id_contrato,"numero_cartao"=>trim($request->numero_cartao),"cvv"=>$request->cvv,"nome_cartao"=>$request->nome_cartao,"validade"=>$request->validade];
        return $requests;
        
    }
    private function validate_card($request){
        $number_card = preg_match('/\b(?:\d[ -]*?){15}\d\b/', trim($request->numero_cartao));
        $array = [$number_card];
        foreach ($array as $datas){
            if($datas != true){
                return false;
            }
        }
        return true;
    }
}
