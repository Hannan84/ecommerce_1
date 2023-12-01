<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // subcategory index method for show all subcategory
    public function index()
    {

        $data = Subcategory::all();
        $categories = Category::all();
        return view('admin.subcategory.index', compact('data', 'categories'));
    }

    // subcategory store method 
    public function store(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'subcategory_name' => 'required|max:55',
        ]);

        Subcategory::create([
            'category_id' => $request->category_name,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
        ]);

        toastr()->success('SubCategory added successful!');
        return redirect()->route('subcategory.index');
    }

    // edit subcategory 
    public function edit($id)
    {
        $categories = Category::all();
        $data = Subcategory::findorfail($id);
        return view('admin.subcategory.edit', compact('data', 'categories'));
    }

    // update subcategory 
    public function update(Request $request)
    {
        $data = Subcategory::find($request->id);
        $data->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
        ]);
        toastr()->success('SubCategory update successful!');
        return redirect()->route('subcategory.index');
    }

    // delete subcategory 
    public function destroy($id)
    {
        $data = Subcategory::find($id);
        $data->delete();

        toastr()->warning('SubCategory deleted!');
        return redirect()->back();
    }
}
