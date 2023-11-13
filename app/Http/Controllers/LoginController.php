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
        // $auth = "";
        $auth = $rpc->authenticate($request->user,$request->pass);
        
        try{
            if($auth == false){
                throw new Exception("Falha no login");
            }
            Session::put('email',$auth);
            return 1;
        }
        catch(Exception $e){
            return response('usuario e senha invalidos',400);
        }

    
        //seta o middleware de sessao
    }
    public function logout(){
        Session::flush();
        Session::forget('email');
        return redirect()->back();
    }
}
