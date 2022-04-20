<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TampilanLoginController extends Controller
{
    public function TampilanLogin()
    {
        return view("/auth/login1");
    }

    public function TampilanRegistrasi()
    {
        return view("/auth/register2");
    }
}
