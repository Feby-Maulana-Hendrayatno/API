<?php

namespace App\Http\Controllers;
use App\Models\Perumahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use RealRashid\SweetAlert\Facades\Alert;
// Use Alert;
// use Alert;
use File;

use Illuminate\Http\Request;

class LandingPageWebController extends Controller
{

    public function index()
    {
        $data = [
            "perumahan" => Perumahan::where('id_user', Auth::user()->id)->get()
        ];

        return view("Landing.index", $data);
    }
}
