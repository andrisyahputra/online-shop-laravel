<?php

namespace App\Http\Controllers;

use App\Models\kerajang;
use Illuminate\Http\Request;

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
        return dd($request->all());
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
        //
    }
}
