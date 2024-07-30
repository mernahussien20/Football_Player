<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class FailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::where('status', 1)->get();
        return view('backend.fails.index' , compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Restore_Player($id)
    {
        // الحصول على اللاعب باستخدام معرفه
        $player = Player::find($id);
    
        // التحقق من وجود اللاعب
        if ($player) {
            // تحديث حالة اللاعب إلى 0
            $player->status = 0;
            $player->save();
    
            // إعادة التوجيه إلى صفحة اللاعبين مع رسالة نجاح
            return redirect()->route('players.index')->with('success', 'لقد تم استرجاع اللاعب مره اخرى');
        } else {
            // إعادة التوجيه إلى صفحة اللاعبين مع رسالة خطأ في حال لم يتم العثور على اللاعب
            return redirect()->route('players.index')->with('error', 'لم يتم العثور على اللاعب');
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fail $fail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fail $fail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fail $fail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fail $fail)
    {
        //
    }
}
