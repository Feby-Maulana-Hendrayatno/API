<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
<<<<<<< HEAD
    public function login()
    {
        return view("/auth/login");
    }

    public function post_login(Request $request)
    {
        if(Auth::attempt(["email" =>$request->email,"password" => $request->password
        ])) {
=======
    public function post_login(Request $request)
    {
        
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {

>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff
            $request->session()->regenerate();

            $data = auth()->user()->id_role;

<<<<<<< HEAD
            if ($data == 1) {

                return redirect("/admin/dashboard");

            } else if ($data == 2) {

                return redirect("/pelatih/dashboard");

            } else if ($data == 3) {

                return redirect("/");

            }

        } else {

            return redirect()->back();

        }
    }


=======
            if ($data == 2) {

                return redirect("/owner/dashboard")->with("sukses", "Anda Berhasil Login");

            } else if ($data == 1) {
                return redirect("/admin/dashboard")->with("sukses", "Anda Berhasil Login");

            } 
            
        } else {
            return redirect()->back();
        }
        
    }

>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff
    public function logout()
    {
        Auth::logout();

<<<<<<< HEAD
        return redirect("/admin/login");
=======
            return redirect("/login");
>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff
    }
}