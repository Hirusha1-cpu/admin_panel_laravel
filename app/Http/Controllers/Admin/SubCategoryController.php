<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        return view('admin.sub_category.create',compact('categories'));
    }
    public function manage(){
        $categories = Category::all();
        return view('admin.sub_category.manage');
    }
}
