<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{

    public function index(Request $request)
    {
<<<<<<< HEAD
        \App\Http\Controllers\User::simpan();
        $respon = "Selamat Datang, " . \Auth::user()->name;
=======
        $data = \App\Models\User::get();
>>>>>>> 270f89e0e59bbf3e917998e02015796f56e847f1
        return [
            'success' => true,
            'data' => $data,
            'pesan' => 'Ok'
        ];
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required|min:2|max:100',
                'email' => 'required|min:2|max:100',
                'password' => 'required|min:2|max:100',
                'tanggal_lahir' => 'required|date',
            ]
        );
        $user               = new \App\Models\User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->password     = $request->password;
        $user->tanggal_lahir= $request->tanggal_lahir;
        $user->save();

        return response()->json(
        [
            'success' => true,
            'data' => $user,
            'pesan' => 'Data berhasil disimpan'
        ],200
        );


    }

}
