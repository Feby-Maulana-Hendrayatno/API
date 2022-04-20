<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff

class TampilanLoginController extends Controller
{
    public function TampilanLogin()
    {
<<<<<<< HEAD
        return view("/auth/login1");
=======
        return view("auth.login");
>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff
    }

    public function TampilanRegistrasi()
    {
<<<<<<< HEAD
        return view("/auth/register2");
    }
=======
        return view("auth.register");
    }

>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff
}
