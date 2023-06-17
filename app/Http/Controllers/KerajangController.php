<?php

namespace App\Http\Controllers;

use App\Models\kerajang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KerajangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // return dd($request->all());
        try {
            if(!Auth::check()){
                return redirect()->route('login');
            }


            DB::beginTransaction();
            $validator = Validator::make($request->all(),[
                'produk_id' => ['required', 'numeric'],
                'kuantitas' => ['required', 'numeric', 'min:1']
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }
            $data = $validator->validate();
            $data['user_id'] = auth()->user()->id;

            kerajang::create($data);
            DB::commit();
            return redirect()->back()->with('success', 'Berhasil Simpan di Keranjang');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            // return dd(auth()->user()->id); //melihat eror
            return redirect()->back()->with('error','Terjadi Masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(kerajang $kerajang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kerajang $kerajang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kerajang $kerajang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kerajang $kerajang)
    {
        // return 'test';
        return dd($kerajang->id);
    //     try {
    //         if (!Auth::check()) {
    //             return redirect()->route('login');
    //         }

    //         DB::beginTransaction();

    //         // Hanya pemilik keranjang yang bisa menghapusnya
    //         if ($kerajang->user_id !== auth()->user()->id) {
    //             return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus keranjang ini.');
    //         }

    //         $kerajang->delete();
    //         DB::commit();
    //         return redirect()->back()->with('success', 'Keranjang berhasil dihapus.');
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         Log::debug($th->getMessage());
    //         return redirect()->back()->with('error', 'Terjadi masalah saat menghapus keranjang.');
    //     }
    }
}
