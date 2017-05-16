<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\chaos_model;

class Controller extends BaseController
{
    public function chaos()
    {
        return new chaos_model();
    }

    public function index()
    {
        return view('kc.login');
    }

    public function login(Request $request)
    {
        $cek = $this->chaos()->login();
        if($cek == 1)
        {
            redirect()
        }else{
            redirect()
        }
    }

}
