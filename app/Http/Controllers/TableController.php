<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

/**
 * Class TableController
 * @package App\Http\Controllers
 */
class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::paginate();

        return view('table.index', compact('tables'))
            ->with('i', (request()->input('page', 1) - 1) * $tables->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table = new Table();
        return view('table.create', compact('table'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Table::$rules);

        $table = Table::create($request->all());

        return redirect()->route('tables.index')
            ->with('success', 'Table created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Table::find($id);

        return view('table.show', compact('table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = Table::find($id);

        return view('table.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Table $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        request()->validate(Table::$rules);

        $table->update($request->all());

        return redirect()->route('tables.index')
            ->with('success', 'Table updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $table = Table::find($id)->delete();

        return redirect()->route('tables.index')
            ->with('success', 'Table deleted successfully');
    }
}
