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
        $sales =  Sale::select('sales.id', 'products.pname', 'sales.qty', 'sales.sale_date', 'customers.cname', 'sales.created_at')
                ->join('products', 'sales.product_id', '=', 'products.id')
                ->join('customers', 'sales.customer_id', '=', 'customers.id')
                ->get();
        return view('sales.index', compact('sales'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // query only products available in stock.
        $products = Product::select('products.pname')
            ->join('stocks', 'stocks.product_id', '=', 'products.id')
            ->get();

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
        // query only products available in stock.
        $products = Product::select('products.id','products.pname')
            ->join('stocks', 'stocks.product_id', '=', 'products.id')
            ->get();

        $customers = Customer::where('id', '>', 0)->get();

        $sale = Sale::find($id);

        return view('sales.edit', compact('products', 'customers', 'sale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'qty' => 'required',
            'sale_date' => 'required',
        ]);

        Sale::find($id)->update([
            'product_id' => $request->input('product_id'),
            'qty' => $request->input('qty'),
            'sale_date' => $request->input('sale_date'),
            'customer_id' => $request->input('customer_id')
        ]);

        return redirect('sales')->with('message', 'Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
