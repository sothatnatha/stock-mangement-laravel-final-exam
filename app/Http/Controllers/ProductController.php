<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products as p')
            ->join('categories as c', 'p.category_id', '=', 'c.id')
            ->join('suppliers as s', 'p.supplier_id', '=', 's.id')
            ->where('p.id', '>', 0)
            ->groupBy('p.id', 'p.pname', 'p.description', 'p.price', 'p.qty', 's.supplier_name', 'c.category_name', 'p.created_at')
            ->select('p.id', 'p.pname', 'p.description', 'p.price', 'p.qty', 's.supplier_name', 'c.category_name', 'p.created_at')
            ->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $suppliers = Supplier::where('id', '>', 0)->get();
        $categories = Category::where('id', '>', 0)->get();

        return view('products.create', compact('suppliers', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd( $request->all());
        $request->validate([
            'pname' => 'required|min:5|max:25|unique:products',
            'description' => 'required|min:10|max:50',
            'price' => 'required|',
            'qty' => 'required|numeric',
        ]);

        Product::create($request->all());

        return redirect('products')->with('message', 'Created!');


       
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
        $suppliers = Supplier::where('id', '>', 0)->get();
        $categories = Category::where('id', '>', 0)->get();
        $product = Product::find($id);
        
        return view('products.edit', compact('product', 'suppliers', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pname' => 'required|min:5|max:25',
            'description' => 'required|min:10|max:50',
            'price' => 'required|',
            'qty' => 'required|',
        ]);

        Product::find($id)->update([
            'pname' => $request->input('pname'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'qty' => $request->input('qty'),
            'supplier_id' => $request->input('supplier_id'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect('products')->with('message', 'Updated!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();
        return redirect('products')->with('message', 'Deleted!');
    }
}
