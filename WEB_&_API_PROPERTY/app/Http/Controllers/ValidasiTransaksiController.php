<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class ValidasiTransaksiController extends Controller
{
    public function index()
    {
        $data = [
            // "deskripsi" => Transaction::where('id_user', Auth::user()->id)->get()
            "validasiTransaksi" => Order::orderBy("name", "ASC")->get()
        ];

        return view("owner.Transaksi.index", $data);
    }


    public function hapus(Request $request)
    {
        Order::where("id", $request->id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }
}





