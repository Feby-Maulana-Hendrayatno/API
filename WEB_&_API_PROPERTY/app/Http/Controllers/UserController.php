<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('nama', 'DESC')->get();
        $response = [
            'message' => 'List coba order by id',
            'data' => $users
        ];

        return response()->json($response, 200);
    }
}
