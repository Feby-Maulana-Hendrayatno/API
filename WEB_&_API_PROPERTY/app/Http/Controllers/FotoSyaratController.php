<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FotoSyarat;
use Illuminate\Support\Facades\Auth;

class FotoSyaratController extends Controller
{

    public function index()
    {
        $data = [
            // "deskripsi" => Transaction::where('id_user', Auth::user()->id)->get()
            "foto_syarat" => FotoSyarat::orderBy("id", "ASC")->get()
        ];
        return view("owner.foto_syarat.index", $data);
    }


    // public function tambah(Request $request)
    // {

    //     $this->validate($request, [
    //         'foto' => 'required',
    //         'foto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    //     ]);

    //     if($request->hasfile('foto'))
    //     {
    //         foreach($request->file('foto') as $image)
    //         {
    //             $name = $image->store("image");
    //             $data[] = $name;
    //         }
    //     }
    //     $form= new FotoSyarat();
    //     $form->foto=json_encode($data);
    //     $form->save();
    //     return redirect("/owner/deskripsi_rumah/deskripsi")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    // }

    public function tambah(Request $request)
    {
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            foreach ($img as $key) {
                $filename = $key->hashName();
                $key->storeAs("image");
                $images = FotoSyarat::create(['image' => $filename]);
            }

            return redirect("owner.deskripsi_rumah.deskripsi")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
        }
    }

}









