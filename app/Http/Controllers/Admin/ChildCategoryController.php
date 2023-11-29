<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Childcategory;
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
                    $actionbtn = '<a href="#" class="btn btn-info btn-sm edit" data-id="{{ $row->id }}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit fa-sm"></i></a>
                <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash fa-sm"></i></a>';

                    return $actionbtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.childcategory.index');
    }
}
