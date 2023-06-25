<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['title']='Pesanan';
        $data['page']='pesanan';
        $data['menu']='index';
        $data['pesanans'] = Pesanan::all()->groupBy('order_id');
        // return dd($data['pesanans']);
        return view('admin.pesanan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($order_id)
    {
        //
        // return dd($order_id);
        $pesanan = Pesanan::where('order_id', $order_id);
        if($pesanan ->count() == 0){
            return abort(404);
        }
        $data['title']='Detail Pesanan';
        $data['page']='pesanan';
        $data['menu']='show';
        $data['pesanans'] = $pesanan->get();
        $data['subtotal'] = $pesanan->sum('total');
        return view('admin.pesanan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
