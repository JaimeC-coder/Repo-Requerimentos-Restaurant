<?php

namespace App\Http\Controllers;

use App\Models\Workstation;
use Illuminate\Http\Request;

/**
 * Class WorkstationController
 * @package App\Http\Controllers
 */
class WorkstationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workstations = Workstation::paginate();

        return view('workstation.index', compact('workstations'))
            ->with('i', (request()->input('page', 1) - 1) * $workstations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workstation = new Workstation();
        return view('workstation.create', compact('workstation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Workstation::$rules);

        $workstation = Workstation::create($request->all());

        return redirect()->route('workstations.index')
            ->with('success', 'Workstation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $workstation = Workstation::find($id);

        return view('workstation.show', compact('workstation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $workstation = Workstation::find($id);

        return view('workstation.edit', compact('workstation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Workstation $workstation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workstation $workstation)
    {
        request()->validate(Workstation::$rules);

        $workstation->update($request->all());

        return redirect()->route('workstations.index')
            ->with('success', 'Workstation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $workstation = Workstation::find($id)->delete();

        return redirect()->route('workstations.index')
            ->with('success', 'Workstation deleted successfully');
    }
}
