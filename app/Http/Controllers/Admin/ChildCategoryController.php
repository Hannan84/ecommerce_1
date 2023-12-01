<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Childcategory;
use Illuminate\Support\Str;
use DataTables;

class ChildCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //useing datatables childcategory index method for show all childcategory
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Childcategory::with('category', 'subcategory')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit fa-sm"></i></a>
                <a href="' . route('childcategory.delete', [$row->id]) . '" onclick="return confirm(`Are you sure you?`);" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-sm"></i></a>';

                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.childcategory.index', compact('categories', 'subcategories'));
    }

    // childcategory store method 
    public function store(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'childcategory_name' => 'required|max:55',
            'subcategory_id' => 'required',
        ]);

        $cat_id = Subcategory::where('id', $request->subcategory_id)->first();
        if ($cat_id) {
            Childcategory::create([
                'category_id' => $cat_id->category_id,
                'subcategory_id' => $request->subcategory_id,
                'childcategory_name' => $request->childcategory_name,
                'childcategory_slug' => Str::of($request->childcategory_name)->slug('-'),
            ]);

            toastr()->success('ChildCategory added successful!');
            return redirect()->route('childcategory.index');
        } else {
            toastr()->error('Please select subcategory!');
            return redirect()->back();
        }
    }

    // edit childcategory 
    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $data = Childcategory::findorfail($id);
        return view('admin.childcategory.edit', compact('data', 'categories', 'subcategories'));
    }

    // update childcategory 
    public function update(Request $request)
    {
        $cat_id = Subcategory::where('id', $request->subcategory_id)->first();
        $data = Childcategory::find($request->id);
        if ($cat_id) {
            $data->update([
                'category_id' => $cat_id->category_id,
                'subcategory_id' => $request->subcategory_id,
                'childcategory_name' => $request->childcategory_name,
                'childcategory_slug' => Str::of($request->childcategory_name)->slug('-'),
            ]);

            toastr()->success('ChildCategory update successful!');
            return redirect()->back();
        }

        toastr()->error('Please select subcategory!');
        return redirect()->back();
    }

    // delete childcategory 
    public function destroy($id)
    {
        $data = Childcategory::find($id);
        $data->delete();

        toastr()->warning('ChildCategory deleted!');
        return redirect()->back();
    }
}
