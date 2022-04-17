<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function post_login(Request $request)
    {
        
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {

            $request->session()->regenerate();

            $data = auth()->user()->id_role;

            if ($data == 2) {

                echo "2";
                //return redirect("/page/bph/dashboard")->with("sukses", "Anda Berhasil Login");

            } else if ($data == 1) {
                return redirect("/admin/dashboard")->with("sukses", "Anda Berhasil Login");

            } else if ($data == 3) {

                echo "3";
                //return redirect("/")->with("sukses", "Anda Berhasil Login");

            }
            
        } else {
            echo "4";
            //return redirect()->back();
        }
        
    }

    public function logout()
    {
        Auth::logout();

            return redirect("/login");
    }
}