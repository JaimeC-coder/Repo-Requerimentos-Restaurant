<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

/**
 * Class PurchaseController
 * @package App\Http\Controllers
 */
class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::paginate();

        return view('purchase.index', compact('purchases'))
            ->with('i', (request()->input('page', 1) - 1) * $purchases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $purchase = new Purchase();
        return view('purchase.create', compact('purchase'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Purchase::$rules);

        $purchase = Purchase::create($request->all());

        return redirect()->route('purchases.index')
            ->with('success', 'Purchase created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::find($id);

        return view('purchase.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = Purchase::find($id);

        return view('purchase.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Purchase $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        request()->validate(Purchase::$rules);

        $purchase->update($request->all());

        return redirect()->route('purchases.index')
            ->with('success', 'Purchase updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id)->delete();

        return redirect()->route('purchases.index')
            ->with('success', 'Purchase deleted successfully');
    }
}
