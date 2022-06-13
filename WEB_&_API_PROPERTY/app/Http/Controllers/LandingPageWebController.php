<?php

namespace App\Http\Controllers;
use App\Models\Perumahan;
use App\Models\DeskripsiRumah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;

use Illuminate\Http\Request;

class LandingPageWebController extends Controller
{

    public function index()
    {
        $data = [
            "foto_syarat" => DeskripsiRumah::orderBy("id", "DESC")->get()
        ];


        return view("Landing.index", $data);
    }

    public function properties()
    {
        $data = [
            "perumahan" => Perumahan::orderBy("id", "DESC")->get()
        ];

        return view("Landing.properties", $data);
    }

    public function blog()
    {
        $data = [
            "perumahan" => Perumahan::orderBy("id", "DESC")->get()
        ];

        return view("Landing.blog", $data);
    }

    public function about()
    {
        $data = [
            "perumahan" => Perumahan::orderBy("id", "DESC")->get()
        ];

        return view("Landing.about", $data);
    }



    public function property()
    {
        $data = [
            "perumahan" => Perumahan::orderBy("id", "DESC")->get()
        ];

        return view("Landing.upload_syarat.index", $data);
    }
}
