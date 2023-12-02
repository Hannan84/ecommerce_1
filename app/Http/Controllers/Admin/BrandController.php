<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;
use Intervention\Image\Facades\Image;

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
                <a href="' . route('brand.delete', [$row->id]) . '" onclick="return confirm(`Are you sure you?`);" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-sm"></i></a>';

                    return $actionbtn;
                })
                ->addColumn('brand_logo', function ($row) {
                    return '<img src="' . $row->brand_logo . '" width="90px"/>';
                })
                ->rawColumns(['brand_logo', 'action'])
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

        $slug = Str::of($request->brand_name)->slug('-');

        $image = $request->brand_logo;
        $image_name = $slug . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(240, 240)->save(public_path('images/brand/' . $image_name));

        Brand::create([
            'brand_name' => $request->brand_name,
            'brand_slug' => $slug,
            'brand_logo' => 'public/images/brand/' . $image_name,
        ]);

        toastr()->success('Brand added successful!');
        return redirect()->back();
    }
    // edit brand 
    public function edit($id)
    {
        $data = Brand::findorfail($id);
        return view('admin.brand.edit', compact('data'));
    }

    // update brand 
    public function update(Request $request)
    {
        $data = Brand::find($request->id);
        $slug = Str::of($request->brand_name)->slug('-');
        $data->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => $slug,
        ]);

        toastr()->success('Brand update successful!');
        return redirect()->back();
    }

    // delete brand 
    public function destroy($id)
    {
        $data = Brand::find($id);
        $image = str_replace('\\', '/', $data->brand_logo);
        if ($image) {
            unlink($image);
            $data->delete();
            toastr()->warning('Brand deleted!');
            return redirect()->back();
        } else {
            $data->delete();
            toastr()->warning('Brand deleted!');
            return redirect()->back();
        }
    }
}
