<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            ->groupBy('p.id', 'p.pname', 'p.picture', 'p.description', 'p.price', 'p.qty', 's.supplier_name', 'c.category_name', 'p.created_at')
            ->select('p.id', 'p.pname','p.picture', 'p.description', 'p.price', 'p.qty', 's.supplier_name', 'c.category_name', 'p.created_at')
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
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $picturePath = $request->file('picture')->store('uploaded-image');


        // Create a new product instance
        $product = new Product();
        $product->pname = $request->pname;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->supplier_id =  $request->supplier_id;
        $product->category_id =  $request->category_id;

        $product->picture = $picturePath;
        
        $product->save();

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

        // dd($request->all());

        $request->validate([
            'pname' => 'required|min:5|max:25',
            'description' => 'required|min:10|max:50',
            'price' => 'required|',
            'qty' => 'required|',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        $product->pname = $request->pname;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->supplier_id =  $request->supplier_id;
        $product->category_id =  $request->category_id;

        if ($request->hasFile('picture')) {

            // Delete the old picture file (if it exists)
            if ($product->picture && Storage::exists($product->picture)) {
                Storage::delete($product->picture);
            }

            // Store the new picture
            $newPicturePath = $request->file('picture')->store('uploaded-image');

            // Update the product record with the new picture file path
             $product->picture = $newPicturePath;
        }

        $product->save();

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
