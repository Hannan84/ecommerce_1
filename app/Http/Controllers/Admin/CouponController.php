<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use DataTables;

class CouponController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    // coupon list show
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Coupon::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id="' . $row->id . '" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit fa-sm"></i></a>
                <a href="' . route('coupon.delete', [$row->id]) . '" onclick="return confirm(`Are you sure you?`);" class="btn btn-danger btn-sm" id="delete_coupon"><i class="fas fa-trash fa-sm"></i></a>';

                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.offer.coupon.index');
    }

    // coupon store into database
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'warehouse_name' => 'required|unique:warehouses',
        // ]);

        Coupon::create([
            'coupon_code' => $request->coupon_code,
            'valid_date' => $request->coupon_date,
            'coupon_amount' => $request->coupon_amount,
            'type' => $request->coupon_type,
            'status' => $request->coupon_status,
        ]);
        return response()->json('Coupon store');
    }

    // delete coupon 
    public function destroy($id)
    {
        $data = Coupon::find($id);
        $data->delete();

        toastr()->success('Category deleted!');
        return response()->json('Category deleted!');

    }
}
