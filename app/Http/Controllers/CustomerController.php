<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::where('id', '>', 0)->get();
        
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cname' => 'required|min:4|max:25',
            'phone_number' => 'required|min:6|max:20',
            'shipping_address' => 'required|min:6|max:192',
            'payment_method' => 'required|min:6|max:192',
        ]);

        Customer::create($request->all());

        return redirect('customers')->with('message', 'Customer created.');
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
        $customer = Customer::find($id);

        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cname' => 'required|min:4|max:25',
            'phone_number' => 'required|min:6|max:20',
            'shipping_address' => 'required|min:6|max:192',
            'payment_method' => 'required|min:6|max:192',
        ]);

        Customer::find($id)->update([
            'cname' => $request->input('cname'),
            'phone_number' => $request->input('phone_number'),
            'shipping_address' => $request->input('shipping_address'),
            'payment_method' => $request->input('payment_method'),
        ]);

        return redirect('customers')->with('message', 'Updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::find($id)->delete();
        return redirect('customers')->with('message', 'Deleted.');

    }
}
