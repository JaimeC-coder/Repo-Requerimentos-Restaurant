<?php

namespace App\Http\Controllers;

use App\Models\DetailElaboration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DetailElaborationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\DetailElaboration  $detailElaboration
     * @return \Illuminate\Http\Response
     */
    public function show(DetailElaboration $detailElaboration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailElaboration  $detailElaboration
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailElaboration $detailElaboration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailElaboration  $detailElaboration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailElaboration $detailElaboration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailElaboration  $detailElaboration
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailElaboration $detailElaboration)
    {
        //
    }

    public function details($id)
    {
        $details = DB::table('detail_elaborations')
            ->join('supplies', 'detail_elaborations.supply_id', '=', 'supplies.id')
            ->select('detail_elaborations.*', 'supplies.name')
            ->where('detail_elaborations.elaboration_id', '=', $id)
            ->get();
        return response()->json($details);
    }
}
