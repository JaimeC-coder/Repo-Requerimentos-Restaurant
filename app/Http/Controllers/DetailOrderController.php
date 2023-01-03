<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use Illuminate\Http\Request;

/**
 * Class DetailOrderController
 * @package App\Http\Controllers
 */
class DetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailOrders = DetailOrder::paginate();

        return view('detail-order.index', compact('detailOrders'))
            ->with('i', (request()->input('page', 1) - 1) * $detailOrders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailOrder = new DetailOrder();
        return view('detail-order.create', compact('detailOrder'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetailOrder::$rules);

        $detailOrder = DetailOrder::create($request->all());

        return redirect()->route('detail-orders.index')
            ->with('success', 'DetailOrder created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailOrder = DetailOrder::find($id);

        return view('detail-order.show', compact('detailOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailOrder = DetailOrder::find($id);

        return view('detail-order.edit', compact('detailOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetailOrder $detailOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailOrder $detailOrder)
    {
        request()->validate(DetailOrder::$rules);

        $detailOrder->update($request->all());

        return redirect()->route('detail-orders.index')
            ->with('success', 'DetailOrder updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detailOrder = DetailOrder::find($id)->delete();

        return redirect()->route('detail-orders.index')
            ->with('success', 'DetailOrder deleted successfully');
    }
}
