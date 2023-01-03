<?php

namespace App\Http\Controllers;

use App\Models\Supplie;
use Illuminate\Http\Request;

class SupplieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplies = Supplie::paginate();

        return view('supplie.index', compact('supplies'))
            ->with('i', (request()->input('page', 1) - 1) * $supplies->perPage());


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('supplie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplie  $supplie
     * @return \Illuminate\Http\Response
     */
    public function show(Supplie $supplie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplie  $supplie
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplie $supplie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplie  $supplie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplie $supplie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplie  $supplie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplie $supplie)
    {
        //
    }
}
