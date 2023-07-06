<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::where('id', '>', 0)->get();
        return view('warehouses.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   

        // Validated form fields
        $request->validate([
            'warehouse_name' => 'required|min:4|max:25|unique:warehouses',
            'address' => 'required|min:4|max:192',
            'capacity' => 'required|numeric',
        ]);

        // store data
        Warehouse::create($request->all());

        // return and show success message.
        return redirect('warehouses')
            ->with('message', 'Created!');
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
        $warehouse = Warehouse::find($id);
        return view('warehouses.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           // Validated form fields
        $request->validate([
            'warehouse_name' => 'required|min:4|max:25',
            'address' => 'required|min:4|max:192',
            'capacity' => 'required|numeric',
        ]);

        Warehouse::find($id)->update([
            'warehouse_name' => $request->input('warehouse_name'),
            'address' => $request->input('address'),
            'capacity' => $request->input('capacity'),
        ]);

        return redirect('warehouses')->with('message', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Warehouse::find($id)->delete();

        return redirect('warehouses')->with('message', 'Deleted.');
    }
}
