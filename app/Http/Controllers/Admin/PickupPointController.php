<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pickuppoint;
use Yajra\DataTables\Facades\DataTables;

class PickupPointController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // PickupPoint list show
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pickuppoint::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit fa-sm"></i></a>
                    <a href="' . route('pickupPoint.delete', [$row->id]) . '"  class="btn btn-danger btn-sm" id="delete_coupon"><i class="fas fa-trash fa-sm"></i></a>';

                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pickuppoint.index');
    }

    // PickupPoint store into database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Pickuppoint::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'alternate_phone' => $request->alternate_phone,
        ]);
        return response()->json('PickupPoint store');
    }

    // edit brand 
    public function edit($id)
    {
        $data = Pickuppoint::findorfail($id);
        return view('admin.pickuppoint.edit', compact('data'));
    }

    //update coupon
    public function update(Request $request){

        $data = Pickuppoint::find($request->id);

        $data->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'alternate_phone' => $request->alternate_phone,
        ]);
        return response()->json('PickupPoint update');
    }

    // delete coupon 
    public function destroy($id)
    {
        $data = Pickuppoint::find($id);
        $data->delete();
        return response()->json('PickupPoint deleted!');

    }
}
