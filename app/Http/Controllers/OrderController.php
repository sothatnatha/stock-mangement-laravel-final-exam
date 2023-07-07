<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::select('orders.id', 'products.pname', 'orders.qty', 'orders.order_date', 'orders.delivery_date')
                ->join('products', 'orders.product_id', '=', 'products.id')
                ->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('id', '>', 0)->get();
        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'qty'=> 'required',
            'order_date' => 'required',
            'delivery_date' => 'required',

        ]);

        Order::create($request->all());

        return redirect('orders')
            ->with('message', 'Order created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = Product::where('id', '>', 0)->get();
        $order = Order::find($id);
        return view('orders.edit', compact('order', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'qty'=> 'required',
            'order_date' => 'required',
            'delivery_date' => 'required',

        ]);

        Order::find($id)->update([
            'product_id' => $request->input('product_id'),
            'order_date' => $request->input('order_date'),
            'delivery_date' => $request->input('delivery_date'),
        ]);

        return redirect('orders')
            ->with('message', 'Order updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::find($id)->delete();
        return redirect('orders')
            ->with('message', 'Order deleted.');
    }
}
