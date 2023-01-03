<?php

namespace App\Http\Controllers;

use App\Models\Supply;
use Illuminate\Http\Request;

/**
 * Class SupplyController
 * @package App\Http\Controllers
 */
class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplies = Supply::paginate();

        return view('supply.index', compact('supplies'))
            ->with('i', (request()->input('page', 1) - 1) * $supplies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supply = new Supply();
        return view('supply.create', compact('supply'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Supply::$rules);

        $supply = Supply::create($request->all());

        return redirect()->route('supplies.index')
            ->with('success', 'Supply created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supply = Supply::find($id);

        return view('supply.show', compact('supply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supply = Supply::find($id);

        return view('supply.edit', compact('supply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Supply $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supply $supply)
    {
        request()->validate(Supply::$rules);

        $supply->update($request->all());

        return redirect()->route('supplies.index')
            ->with('success', 'Supply updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $supply = Supply::find($id)->delete();

        return redirect()->route('supplies.index')
            ->with('success', 'Supply deleted successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getSupply($id)
    {
        $supply = Supply::find($id);

        return response()->json($supply);
    }
}
