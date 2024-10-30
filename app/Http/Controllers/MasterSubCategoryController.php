<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class MasterSubCategoryController extends Controller
{
    public function storesubcat(Request $request){
        $validate_data = $request->validate([
            'subcategory_name' => 'max:100|min:3',
            'category_id'=>'required|exists:categories,id'
        ]);
        SubCategory::create($validate_data);
        return redirect()->back()->with('success', 'Sub Category Added Successfully');
    }

  
    public function showsubcat($id)
    {
        $subcategory_info = SubCategory::find($id);
        return view('admin.subcategory.edit', compact('subcategory_info'));
    }
    public function updatesubcat(Request $request, $id)
    {
        $category = SubCategory::findOrFail($id);
        $validate_data = $request->validate([
            'category_name' => 'unique:categories|max:100|min:3'
        ]);

        $category->update($validate_data);
        return redirect()->back()->with('success','SubCategory Updated Successfully');
    }

    public function deletesubcat($id){
        $category = SubCategory::findOrFail($id)->delete();
        return redirect()->back()->with('success','SubCategory Deleted Successfully');

    }


}
