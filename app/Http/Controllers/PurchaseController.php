<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use App\Models\Supply;
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
        $supplier = Supplier::pluck('name', 'id');
        $products = Supply::all();

        return view('purchase.create', compact('supplier','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //equest()->validate(Purchase::$rules);
//return $request;
        DB::transaction(function () use ($request) {
            $purchase = Purchase::create([
                'employee_id' => $request->employee_id,
                'supplier_id' => $request->supplier_id,
            ]);
            for ($i = 0; $i < sizeof($request->list_productos); $i++) {
                PurchaseOrder::create([
                    'purchase_id' => $purchase->id,
                    'supply_id' => $request->list_productos[$i],
                    'quantity' => $request->list_quantity[$i],
                ]);
            }
        });

        return redirect()->route('purchases.index')
            ->with('success', 'Purchase updated successfully');
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

        $supplier = Supplier::pluck('name', 'id');
        $products = Supply::all();

        return view('purchase.edit', compact('purchase', 'supplier','products'));


    }
    public function listSupplier($id)
    {
         //devuelve el detalle de la orden mas el nombre del producto con el id de la order

        $detailOrder = PurchaseOrder::with('supply')->where('purchase_id', $id)->get();
        return response()->json($detailOrder);
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
