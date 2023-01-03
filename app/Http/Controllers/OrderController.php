<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Order;
use App\Models\Table;
use App\Models\Product;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate();

        return view('order.index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * $orders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return redirect()->route('orders.index')
            ->with('success', 'table not selected');
    }


    public function createT($id)
    {

        $products = Product::all();
        $employee = Employee::find(Auth::user()->id);

        $table = Table::find($id);

        return view('order.create', compact('table','employee','products'));
    }

    public function buscarProduct($id)
    {

        $product = Product::find($id);
        return $product;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(Order::$rules);

        DB::transaction(function () use ($request){
            $order = Order::create([
                'amount' => $request->amount,
                'table_id' => $request->table_id,
                'employee_id' => $request->employee_id,

            ]);
            for ($i=0; $i < sizeof($request->list_productos) ; $i++) {
                DetailOrder::create([
                    'order_id' => $order->id,
                    'product_id' => $request->list_productos[$i],
                    'quantity' => $request->list_quantity[$i],
                    'price' => $request->list_precios[$i],
                ]);
            }

            $order->table()->update([
                'status' => 'reserved',

            ]);


        });



        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        request()->validate(Order::$rules);

        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
