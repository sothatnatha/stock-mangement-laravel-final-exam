<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriesDataTable;
use Illuminate\Support\Facades\DB;
use Pest\Support\View;
use \Yajra\DataTables\Facades\DataTables;
use App\Models\Category;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('id', '>', '0')->get();

        return view('categories.index', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'category_name' => 'required|string|min:4|max:15|unique:categories'
        ]);
        
        Category::create($request->all());
        return redirect()
            ->back()
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'category_name' => 'required|string|min:4|max:15|'
        ]);
        
        Category::find($id)->update([
                'category_name' => $request->input('category_name'),
        ]);
        return redirect()
            ->back()
            ->with(
                'message',
                'Update successfully!'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Category::find($id)->delete();
        return redirect('/categories')
            ->with('message', 'Deleted successfully!');
    }
}
