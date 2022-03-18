<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiUserController extends Controller
{

    public function index(Request $request)
    {
        \App\Http\Controllers\User::simpan();
        $respon = "Selamat Datang, " . \Auth::user()->name;
        return [
            'success' => true,
            'data' => $respon,
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
