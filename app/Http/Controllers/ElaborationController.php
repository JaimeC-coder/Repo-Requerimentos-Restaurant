<?php

namespace App\Http\Controllers;

use App\Models\Elaboration;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supply;
use App\Models\Employee;
use App\Models\DetailElaboration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        $employee = Employee::find(Auth::user()->id);

        $products = Product::all()->where('prepared', 0);
        $supplies = Supply::all()->where('stock', '>', 0);


        return view('elaboration.create', compact('elaboration', 'products', 'supplies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $insumo_cantidad = $request->insumo_cantidad;
        $insumo_id = $request->insumo_id;
        // return $supplies_id;
        $elaboration = Elaboration::create(
            [
                'product_id' => $request->products,
                'employee_id' => DB::table('employees')->where('user_id', Auth::user()->id)->first()->id,
                'cuantity' => $request->cuantity
            ]
        );
        for ($i = 0; $i < count($insumo_id); $i++) {
            DetailElaboration::create(
                [
                    'elaboration_id' => $elaboration->id,
                    'supply_id' => $insumo_id[$i],
                    'quantity' => $insumo_cantidad[$i]
                ]
            );

            $supply = Supply::find($insumo_id[$i])->decrement('stock', $insumo_cantidad[$i]);

        }


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
