<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }
    public function create(Request $request)
    {
        Unit::newUnit($request);
        return back()->with('message','Unit Create Info Successfully');
    }
    public function manage()
    {
        return view('admin.unit.manage',['units' => Unit::all()]);
    }
    public function edit($id)
    {
        return view('admin.unit.edit',['unit' => Unit::find($id)]);
    }
    public function update(Request $request,$id)
    {
        Unit::updateUnit($request,$id);
        return redirect('/unit/manage')->with('message','Unit Update Info Successfully');
    }
    public function delete($id)
    {
        Unit::deleteUnit($id);
        return redirect('/unit/manage')->with('message','Unit Delete Info Successfully');
    }
}
