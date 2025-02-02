<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index',['categories' => Category::all()]);
    }
    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        return redirect('/sub-category/add')->with('message','Sub-Category Info Create Successfully');
    }
    public function manage()
    {
        return view('admin.sub-category.manage',['sub_categories' => SubCategory::all()]);
    }
    public function edit($id)
    {
        return view('admin.sub-category.edit',[
            'sub_category' => SubCategory::find($id),
            'categories' => Category::all()
        ]);
    }
    public function update(Request $request,$id)
    {
        SubCategory::updateSubCategory($request,$id);
        return redirect('/sub-category/manage')->with('message','Sub-Category Info Update Successfully');
    }
    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('/sub-category/manage')->with('message','Sub-Category Info Delete Successfully');
    }
}
