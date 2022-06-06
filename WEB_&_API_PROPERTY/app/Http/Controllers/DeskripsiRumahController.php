<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\DeskripsiRumah;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DeskripsiRumahController extends Controller
{
    public function index()
    {
        $data = [
            "deskripsi" => DeskripsiRumah::where('id_user', Auth::user()->id)->get()
        ];

        return view("/owner/deskripsi_rumah/data_deskripsi_rumah", $data);
    }

    public function tambah(Request $request)
    {
        return view("/owner/deskripsi_rumah/add_deskripsi");
    }


    public function tambah_data(Request $request)
    {
        if ($request->file("foto")) {
            $coba = $request->file("foto")->store("image");
        }
        DeskripsiRumah::create([
            "type" => $request->type,
            "foto" => $coba,
            "id_user" => Auth::user()->id,
            "kusen" => $request->kusen,
            "pintu"=> $request->pintu,
            "jendela" => $request->jendela,
            "plafond" => $request->plafond,
            "air" => $request->air,
            "listrik" => $request->listrik,
            "pondasi" => $request->pondasi,
            "dinding" => $request->dinding,
            "lantai" => $request->lantai,
            "atap" => $request->atap,
            "wc" => $request->wc,
            "harga" => $request->harga,
        ]);
        return redirect("/owner/deskripsi_rumah/deskripsi")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di Simpan', 'success');</script>"]);
    }

    public function edit($id)
    {
        $data = [
            "edit" => DeskripsiRumah::where("id", base64_decode($id))->first(),
        ];

        return view("owner.deskripsi_rumah.edit_deskripsi", $data);
    }

    public function simpan(Request $request)
    {
        if ($request->file("foto")) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $coba = $request->file("foto")->store("image");
        }else{
            $coba = $request->oldImage;
        }
        DeskripsiRumah::where("id", $request->id)->update([
            "type" => $request->type,
            "foto" => $coba,
            "kusen" => $request->kusen,
            "pintu" => $request->pintu,
            "jendela" => $request->jendela,
            "plafond" => $request->plafond,
            "air" => $request->air,
            "listrik" => $request->listrik,
            "pondasi" => $request->pondasi,
            "dinding" => $request->dinding,
            "lantai" => $request->lantai,
            "atap" => $request->atap,
            "wc" => $request->wc,
            "harga" =>$request->harga
        ]);


        return redirect("/owner/deskripsi_rumah/deskripsi")->with(["message" => "<script>Swal.fire('Berhasil', 'Data Berhasil di update', 'success');</script>"]);
    }


    public function hapus(Request $request)
    {
        DeskripsiRumah::where("id", $request->id)->delete();

        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }

    public function detail_deskripsi(Request $request)
    {
        $data = [
            "detail" => DeskripsiRumah::where("id", $request->id)->first()
        ];

        return view("owner.deskripsi_rumah.detail_deskripsi", $data);
    }


    public function payment($id)
    {
        $data = [
            "edit" => DeskripsiRumah::where("id", $id)->first(),
        ];
        // return view("payment.payment", $data);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;



        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data['edit']->harga,
                'custom_field1' =>$data['edit']->lantai,

            ),
            // 'item_details' => array(
            //     [
            //         'id' => 'a1',
            //         'price' => '1',
            //         'quantity' => 1,
            //         'name' => ''
            //     ],
            //     [
            //         'id' => 'b1',
            //         'price' => '8000',
            //         'quantity' => 1,
            //         'name' => 'Jeruk'
            //     ]
            // ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,                // 'last_name' => $data['edit']->harga,
                // 'name' => Auth::user()->name,
                'email' => Auth::user()->email,

            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('payment/payment', ['snap_token'=>$snapToken]);
    }

        public function payment_post(Request $request){
            $json = json_decode($request->get('json'));
            $order = new Order();
            $order->status = $json->transaction_status;
            $order->email = Auth::user()->name;
            $order->email = Auth::user()->email;
            $order->transaction_id = $json->transaction_id;
            $order->order_id = $json->order_id;
            $order->gross_amount = $json->gross_amount;
            $order->payment_type = $json->payment_type;
            $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
            $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
            return $order->save() ? redirect(url('/'))->with('alert-success', 'Order berhasil dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
        }
    }

