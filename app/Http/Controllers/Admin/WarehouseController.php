<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use DataTables;

class WarehouseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    // warehouse list show
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Warehouse::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit fa-sm"></i></a>
                <a href="' . route('warehouse.delete', [$row->id]) . '" onclick="return confirm(`Are you sure you?`);" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-sm"></i></a>';

                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.warehouse.index');
    }

    // warehouse store into database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'warehouse_name' => 'required|unique:warehouses',
        ]);

        Warehouse::create([
            'warehouse_name' => $request->warehouse_name,
            'warehouse_address' => $request->warehouse_address,
            'warehouse_phone' => $request->warehouse_phone,
        ]);

        toastr()->success('Warehouse added successful!');
        return redirect()->route('warehouse.index');
    }

    // edit warehouse 
    public function edit($id)
    {
        $data = Warehouse::findorfail($id);
        return view('admin.warehouse.edit', compact('data'));
    }

    // update warehouse 
    public function update(Request $request)
    {
        $data = Warehouse::find($request->id);
        $data->update([
            'warehouse_name' => $request->warehouse_name,
            'warehouse_address' => $request->warehouse_address,
            'warehouse_phone' => $request->warehouse_phone,
        ]);
        toastr()->success('Warehouse update successful!');
        return redirect()->route('warehouse.index');
    }
    // warehouse delete from database
    public function destroy($id)
    {
        $data = Warehouse::find($id);
        $data->delete();

        toastr()->success('Warehouse deleted!');
        return redirect()->back();
    }
}
