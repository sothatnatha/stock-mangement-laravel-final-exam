<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Stock;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales =  Sale::where('id', '>', 0)->get();
        return view('sales.index', compact('sales'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('id', '>', 0)->get();
        $customers = Customer::where('id', '>', 0)->get();

        return view('sales.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'qty' => 'required',
            'sale_date' => 'required',
        ]);

        Sale::create($request->all());

        $pid = $request->product_id;
        $qty = $request->qty;
        
        Stock::where('product_id', $pid)
        ->decrement('qty', $qty);

        return redirect('sales')->with('message', 'Sale created.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
