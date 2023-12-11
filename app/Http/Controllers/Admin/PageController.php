<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // all page show
    public function index(){
        $page = Page::all();
        return view('admin.settings.page.index',compact('page'));
    }

    // page create 
    public function create(Request $request){
        return view('admin.settings.page.create');
    }

    // store page into database
    public function store(Request $request)
    {
        Page::create([
            'page_position' => $request->page_position,
            'page_name' => $request->page_name,
            'page_slug' => Str::of($request->page_name)->slug('-'),
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
        ]);

        toastr()->success('Page Create successful!');
        return redirect()->route('page.index');
    }
}
