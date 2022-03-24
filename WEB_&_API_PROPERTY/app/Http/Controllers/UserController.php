<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Owner;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('nama', 'DESC')->get();
        //$response = [
         //   'message' => 'List coba order by id',
        //    'data' => $users
        $data = [
            "data_owner" => Owner::orderBy("id", "DESC")->get()
        ];

        //return response()->json($response, 200);
        return view("/admin/owner/data_owner", $data);
    }
    public function create()
    {
        $data = [
        "data_pelatih" => Owner::all()
    ];

    return view("/admin/owner/addowner/index", $data);
    }
    public function tambah_data()
    {
        return view("/admin/owner/addowner");
    }
    public function store(Request $request)
    {

        $validateData = $request->validate([
            "id" => "required",
            "nama" => "required",
            "email" => "required",
            "no_hp" => "required",
            "password" => "required",
            "foto" => "image"
        ]);

        if ($request->file("foto")) {
            $validateData['foto'] = $request->file("foto")->store("image");
        }


        return redirect("/admin/owner")->with("tambah", "Data Berhasil di Tambahkan");
    }
    public function edit($id)
    {
        $data = [
            "edit" => Owner::where("id", $id)->first()
        ];
        return view("/admin/owner/edit_owner", $data);
    }
    public function detail($id)
    {
        $data = [
            "detail" => Owner::where("id", $id)->first()
        ];

        return view("/admin/owner/detail_owner", $data);
    }
    public function update(Request $request)
    {
        $validateData = $request->validate([
            "id" => "required",
            "nama" => "required",
            "email" => "required",
            "no_hp" => "required",
            "password" => "required",
            "foto" => "image"
        ]);

        if ($request->file("foto")) {

            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['foto'] = $request->file("foto")->store("image");
        }

        Owner::where("id", $request->id)->update($validateData);

        return redirect("/admin/owner")->with("update", "Data Berhasil di update");
    }
    public function destroy(Request $request)
    {

        if ($request->foto) {
            Storage::delete($request->foto);
        }

        $data = Owner::where("id", $request->id)->first();

        $nama_owner = $data->nama_owner;

        Owner::where("id", $request->id)->delete();

        User::where("name", $nama_owner)->delete();

        return redirect()->back();
    }
}
