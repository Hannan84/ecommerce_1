<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // subcategory index method for show all subcategory
    public function index(){

        $data = Subcategory::all();
        return view('admin.subcategory.index',compact('data'));
    }

}
