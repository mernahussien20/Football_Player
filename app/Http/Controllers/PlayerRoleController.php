<?php

namespace App\Http\Controllers;

use App\Models\Player_role;
use App\Models\Births;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Player_role::all();
        return view('backend.roles.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Player_role::create([
            'name' => $request->name,
          
        ]);
        return redirect()->route('roles.index')->with('message', "تم إضافة  بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(Player_role $player_role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role =Player_role::find($id);
        return view('backend.roles.edit' , compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $role = Player_role::findOrFail($id);
        $role->update([
            'name' => $request->name,
           
        ]);
        return redirect()->route('roles.index')->with('message', "تم تحديث  بنجاح");
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Player_role::find($id)->delete();
        return redirect()->route('roles.index')->with('message' , "تم إزالة  بنجاح");
    }


    // filter functios

    public function Roles_Show(Request $request)
    {
        $role = $request->role;
        $rolee =   Player_role::where('name', $role)->first();
        $players = Player::where('role_id', $rolee->id)->get();
    
        $search = $role;
    
        return view('backend.players.filter', compact('players', 'search'));
    }


    public function Births_Show(Request $request)
    {
        $birthYear = $request->birthyear;
      
        $birth = Births::where('birthyear', $birthYear)->first();
        $players = Player::where('birth_id', $birth->id)->get();
        $search = $birthYear ;

        return view('backend.players.filter', compact('players', 'search'));
    }
    


    public function governorates_Show(Request $request)
    {
        $governorate = $request->governorate;
        $players = Player::where('governorate', $governorate)->get();
        $search = $governorate;
        
        return view('backend.players.filter' , compact('players',"search"));
    }

}
