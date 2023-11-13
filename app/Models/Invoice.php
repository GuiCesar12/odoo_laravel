<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rpc;
class Invoice extends Model
{
    use HasFactory;
    public function get_invoices($user,$pass,$id){
        $id = $this->get_id_contact_user($user,$pass,$id);
        
        $run = shell_exec("python3 python_scripts/invoices.py " . $user . " " . $pass." ".$id." 2>&1");
        $result = json_decode($run,true);
        return $result;

    }
    protected function get_id_contact_user($user,$pass,$id){
        $run = shell_exec("python3 python_scripts/contacts.py " . $user . " " . $pass." ".$id." 2>&1");
        $result = json_decode($run,true);
        
        return $result["id"];

    }
    public function download_invoice($user,$pass,$id_invoice){
        $run = shell_exec("python3 python_scripts/download_invoice.py " . $user . " " . $pass." ".$id_invoice." 2>&1");
        $result = json_decode($run,true);
        dd($run);
        return $result["id"];
    }
}
