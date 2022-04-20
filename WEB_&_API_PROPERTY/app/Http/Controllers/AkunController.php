<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AkunController extends Controller
{
    public function index()
    {
        $data = [
            "data_akun" => User::orderBy("name", "ASC")->get()
        ];

        return view("/admin/users/akun", $data);
    }

    public function tambah(Request $request)
    {
<<<<<<< HEAD
        User::create($request->all());

        return redirect("/")->with("sukses");
=======
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "id_role" => 1,
            "password" => bcrypt($request->password)
        ]);

        return redirect("/login");
>>>>>>> 41739cf831c79f4678fbadfe1ca0391c524c78ff
    }

    public function hapus(Request $request)
    {
        User::where("id", $request->id)->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $data = [
            "edit" => User::where("id", $id)->first(),
            "data_akun" => User::where("id", "!=", $id)->orderBy("id", "ASC")->get()
        ];

        return view("/admin/users/edit_akun", $data);
    }

    public function simpan(Request $request)
    {
        User::where("id", $request->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "id_role" =>  $request->id_role,
            "password" => bcrypt($request->password),

        ]);

        return redirect("/users");
    }
}
