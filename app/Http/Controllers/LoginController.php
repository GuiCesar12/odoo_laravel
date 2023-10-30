<?php

namespace App\Http\Controllers;
use App\Models\Rpc;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login.login');
    }
    public function login(Request $request){
        //fazer autenticação
        $rpc = new Rpc;
        $auth = $rpc->autenticate($request->user,$request->pass);
        
        try{
            if($auth == $request->user){
                Session::put('name',bcrypt($auth));
            }
            


        }
        catch(Exception $e){
            return response('usuario e senha invalidos',400);
        }

    
        //seta o middleware de sessao
    }
}
