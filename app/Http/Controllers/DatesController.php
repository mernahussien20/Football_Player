<?php

namespace App\Http\Controllers;

use App\Models\Da;
use Illuminate\Http\Request;

class DatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dates = Da::all();
        return view('backend.appoiments.index', compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.appoiments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Da::create([
            'timee' => $request->timee,
            'datee' => $request->datee,
        ]);
        return redirect()->route('dates.index')->with('message', "تم إضافة بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(Da $dates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $da = Da::find($id);
        return view('backend.appoiments.edit', compact('da'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $da = Da::findOrFail($id);
        $da->update([
            'timee' => $request->timee,
            'datee' => $request->datee,
        ]);
        return redirect()->route('dates.index')->with('message', "تم تحديث بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Da::find($id)->delete();
        return redirect()->route('dates.index')->with('message', "تم إزالة بنجاح");
    }
}