<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Rumah;

class RumahController extends Controller
{
    public function index()
    {
        $rumah = Rumah::orderBy('id', 'DESC')->get();
        $response = [
            'message' => 'List coba order by id',
            'data' => $rumah
        ];

        return response()->json($response, 200);
        // return response()->json($response, Response::HTTP_OK);
    }
}
