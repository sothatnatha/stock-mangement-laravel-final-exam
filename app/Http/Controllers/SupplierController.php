<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::where('id', '>', 0)->get();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('suppliers.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'supplier_name' => 'required|min:8|max:25|unique:suppliers',
            'contact_info' => 'required',
            'address' => 'required|min:8|max:25',
        ]);

        // dd($request->all());

        Supplier::create($request->all());

        return redirect('suppliers')->with('message', 'Created!');
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
        $supplier = Supplier::find($id);

        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          
        $request->validate([
            'name' => 'required|min:8|max:25|',
            'contact_info' => 'required',
            'address' => 'required|min:8|max:25',
        ]);

        // dd($request->all());

        Supplier::find($id)->update([
            'name' => $request->input('name'),
            'contact_info' => $request->input('contact_info'),
            'address' => $request->input('address'),
        ]);

        return redirect('suppliers')->with('message', 'Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::find($id)->delete();
        return redirect('suppliers')->with('message', 'Deleted!');

    }
}
