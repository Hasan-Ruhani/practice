<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function api(){
        $data = [
            "type" => "string",
            "status" => 200,
            "value" => "success"
            
        ];
        return json_encode($data);
    }
}
