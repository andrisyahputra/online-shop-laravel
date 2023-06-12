<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //
    public function index()
    {
        $data['title'] = env('APP_NAME');
        $data['kategoris'] = Kategori::all();
        $data['produks'] = Produk::all();
        return view('index', $data);
    }
}
