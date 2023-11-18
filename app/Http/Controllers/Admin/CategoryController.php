<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // category index method 
    public function index()
    {
        $data = Category::all();
        return view('admin.category.index', compact('data'));
    }

    // store category into database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);

        toastr()->success('Category added successful!');
        return redirect()->route('category.index');
    }


    // edit category 
    public function edit($id)
    {
        $data = Category::findorfail($id);
        return response()->json($data);
    }

    // update category 
    public function update(Request $request)
    {
        $data = Category::find($request->id);
        $data->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::of($request->category_name)->slug('-'),
        ]);
        toastr()->success('Category update successful!');
        return redirect()->route('category.index');
    }

    // delete category 
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();

        toastr()->warning('Category deleted!');
        return redirect()->back();
    }
}
