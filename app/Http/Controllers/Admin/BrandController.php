<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Intervention\Image\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //useing datatables brand index method for show all brand
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Brand::all();

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
        return view('admin.brand.index');
    }

    // brand store method 
    public function store(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'brand_name' => 'required|max:55',
        ]);

        $slug = Str::of($request->childcategory_name)->slug('-');

        $image = $request->brand_logo;
        $image_name = $slug . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(240, 150)->save('public/images/brand/' . $image_name);

        Brand::create([
            'brand_name' => $request->childcategory_name,
            'brand_slug' => $slug,
            'brand_logo' => 'public/images/brand/' . $image_name,
        ]);

        toastr()->success('Brand added successful!');
        return redirect()->back();
    }
}
