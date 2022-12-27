<?php

namespace App\Http\Controllers;

use App\Models\Elaboration;
use Illuminate\Http\Request;

/**
 * Class ElaborationController
 * @package App\Http\Controllers
 */
class ElaborationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elaborations = Elaboration::paginate();

        return view('elaboration.index', compact('elaborations'))
            ->with('i', (request()->input('page', 1) - 1) * $elaborations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $elaboration = new Elaboration();
        return view('elaboration.create', compact('elaboration'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Elaboration::$rules);

        $elaboration = Elaboration::create($request->all());

        return redirect()->route('elaborations.index')
            ->with('success', 'Elaboration created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $elaboration = Elaboration::find($id);

        return view('elaboration.show', compact('elaboration'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $elaboration = Elaboration::find($id);

        return view('elaboration.edit', compact('elaboration'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Elaboration $elaboration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Elaboration $elaboration)
    {
        request()->validate(Elaboration::$rules);

        $elaboration->update($request->all());

        return redirect()->route('elaborations.index')
            ->with('success', 'Elaboration updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $elaboration = Elaboration::find($id)->delete();

        return redirect()->route('elaborations.index')
            ->with('success', 'Elaboration deleted successfully');
    }
}
