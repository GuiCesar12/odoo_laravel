<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rpc extends Model
{

    use HasFactory;
    
    
    protected $user = null;
    protected $pass = null;
    protected $uid = null;
    protected $url = "https://tracktrace-hom.trackerp.com";
    protected $db = "tracktrace-hom";
    protected $api_key = "519dd3f2e4a14fdd61654a88b642a0ca22a43520";
    
   
    


    public function authenticate($user,$pass){
        // $run = shell_exec("python3 authenticate.py " . $user . " " . $pass." 2>&1");
        $run = shell_exec("python3 python_scripts/authenticate.py " . $user . " " . $pass." 2>&1");
        // dd(json_decode($run)[0]->login);
        
        $result = json_decode($run,true);
        // dd($result);
        if(!$result == null){
            return ["email"=>$result[0]["login"],"senha"=>$pass,"id"=>$result[0]["id"]];
        }else{
            return null;
        }
    }

}
