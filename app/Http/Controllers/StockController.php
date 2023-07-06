<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $stocks = Stock::join('products as p', 'p.id', '=', 'stocks.product_id')
            ->select('stocks.id', 'p.pname', 'stocks.qty', 'stocks.location', 'stocks.created_at', 'stocks.updated_at')
            ->get();

        return view('stocks.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('id', '>', 0)->get();
        return view('stocks.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'qty' => 'required|integer',
            'location' => 'required|min:4|max:25'
        ]);

        // dd($request->all());

        Stock::create($request->all());

        return redirect("/stocks")
            ->with(
                'message',
                'Created successfully!'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   

        $products = Product::where('id', '>', 0)->get();
        $stock = Stock::find($id);
        return view('stocks.edit', compact('stock', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'qty' => 'required|integer',
            'location' => 'required|min:4|max:25'
        ]);

        Stock::find($id)->update([
            'product_id' => $request->input('product_id'),
            'qty' => $request->input('qty'),
            'location' => $request->input('location')
        ]);

        return redirect('stocks')->with('message', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Stock::find($id)->delete();
        return redirect('stocks')->with('message', 'Deleted!');
    }
}
