<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        return view('backend.branches.index' , compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.branches.create');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Branch::create([
            'name' => $request->name,
           
        ]);
        return redirect()->route('branches.index')->with('message', "تم إضافة  بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $branch =Branch::find($id);
        return view('backend.branches.edit' , compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $branch = Branch::findOrFail($id);
        $branch->update([
            'name' => $request->name,
           
        ]);
        return redirect()->route('branches.index')->with('message', "تم تحديث  بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        Branch::find($id)->delete();
        return redirect()->route('branches.index')->with('message' , "تم إزالة  بنجاح");
    }
}
