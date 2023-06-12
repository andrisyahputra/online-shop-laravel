<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indexController extends Controller
{
    //
    public function index()
    {
        $data['title'] = env('APP_NAME');
        return view('index', $data);
    }
}
