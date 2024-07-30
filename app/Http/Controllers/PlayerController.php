<?php

namespace App\Http\Controllers;
use App\Services\GovernorateService;
use App\Models\Player;
use App\Models\Player_role;
use App\Models\Births;
use App\Models\Branch;
use App\Models\Exam;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function __construct(GovernorateService $governorateService)
    {
        $this->governorateService = $governorateService;
    }

     public function create()
    {
        $roles = Player_role::all();
        $governorates = $this->governorateService->getGovernorates();
        $branches = Branch::all();
        return view('WebSite.player',compact('roles','governorates','branches'));
    }
    
    public function index()
    {
        
        $players = Player::where('status', 0)->get();
        $roles = Player_role::all();
        $births = Births::distinct('birthyear')->pluck('birthyear');
        $branches = Branch::all();
        $governorates = $this->governorateService->getGovernorates();
        return view('backend.players.index' , compact('players','roles','births','governorates','branches'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|unique:players,phone',
            'birthday' => 'required|date',
            'birthyear' => 'required|date_format:Y|digits:4',
            'governorate' => 'required|string',
            'role' => 'required|exists:player_roles,id',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'birth_image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'الاسم ثلاثي مطلوب.',
            'phone.required' => 'رقم التليفون مطلوب.',
            'phone.unique' => 'رقم التليفون مأخوذ من قبل، يرجى إدخال رقم آخر.',
            'birthday.required' => 'تاريخ الميلاد مطلوب.',
            'birthyear.required' => 'سنة الميلاد مطلوبة.',
            'birthyear.date_format' => 'سنة الميلاد يجب أن تكون بصيغة YYYY.',
            'governorate.required' => 'المحافظة مطلوبة.',
            'role.required' => 'مركز اللاعب مطلوب.',
            'role.exists' => 'المركز المحدد غير موجود.',
            'image.mimes' => 'الصورة الشخصية يجب أن تكون بامتداد jpeg, png, jpg, gif, svg.',
            'image.max' => 'حجم الصورة الشخصية لا يجب أن يتجاوز 2MB.',
            'birth_image.mimes' => 'صورة شهادة الميلاد يجب أن تكون بامتداد jpeg, png, jpg, gif, svg.',
            'birth_image.max' => 'حجم صورة شهادة الميلاد لا يجب أن يتجاوز 2MB.',
        ]);
    
         //upload image
         $imageName = time().'.'.$request->image->extension();
         $request->image->move(public_path('players'), $imageName);

          //upload image
        $imageNamee = time().'.'.$request->birth_image->extension();
        $request->birth_image->move(public_path('players'), $imageNamee);


        $birthOfYear = new Births;
        $birthOfYear->birthyear = $request->birthyear;
        $birthOfYear->save();

        $player = new Player();
        $player->name = $request->name;
        $player->birthday = $request->birthday;
        $player->governorate = $request->governorate;
        $player->phone = $request->phone;
        $player->birth_id = $birthOfYear->id;
        $player->role_id = $request->role;
        $player->branch_id = $request->branch;
        $player->personal_image = $imageName;
        $player->birth_image = $imageNamee;
        $player->status = 0 ;
        $player->save();

        return view('WebSite.body')->with('message', "تم الاضافه بنجاح");;
   
    }

        public function update(Request $request, $id)
    {
     $player = Player::find($id);
     $request->validate([
        'birthyear' => 'required|digits:4',
        'phone' => 'required|unique:players,phone,' . $player->id,
        'name' => 'required|string|max:255',
      
        'birthday' => 'required|date',
        'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'birth_image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ], [
        'birthyear.required' => 'سنة الميلاد مطلوبة.',
       
        'birthyear.digits' => 'ينبغى ان يكون هناك اربع خانات لسنة الميلاد .',
        'phone.required' => 'رقم التليفون مطلوب.',
        'phone.unique' => 'رقم التليفون ماخوذ من قبل ينبغى ادخال رقم اخر',
    ]);

        $birth = Births::where('id', $player->birth_id)->first();
        $birth->birthyear = $request->birthyear;
        $birth->save();

        if (!$request->image){
            $imageName = $player->image;
        }else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('players'), $imageName);
        }


        if (!$request->birth_image){
            $imageNamee = $player->birth_image;
        }else{
            $imageNamee = time().'.'.$request->birth_image->extension();
            $request->birth_image->move(public_path('players'), $imageNamee);
        }

        $player->name  = $request->name;
        $player->personal_image  =$imageName;
        $player->birth_image  =$imageNamee;
        $player->phone  = $request->phone;
        $player->role_id  = $request->role;
        $player->branch_id = $request->branch;
        $player->governorate =  $request->governorate;
        $player->birthday = $request->birthday;
        $player->status = 0;
        $player->save();
        return redirect()->route('players.index')->with('message', "تم التعديل بنجاح");

    }

    public function edit($id)
    {
        $governorates = $this->governorateService->getGovernorates();
        $player =Player::find($id);
        $roles = Player_role::all();
        $branches = Branch::all();
    
        return view('backend.players.edit' , compact('player','roles','governorates','branches'));
    }

    public function destroy($id)
    {
        Player::find($id)->delete();
        return redirect()->route('players.index')->with('message', "تم الحذف بنجاح");
    }
    
    
     public function finalDestroy($id)
    {
        Player::find($id)->delete();
        return redirect()->route('failPlayers')->with('message', "تم الحذف بنجاح");
    }


    public function show($id)
    {
        $player = Player::find($id);
         $exams = Exam::all();
        return view('backend.players.show' , compact('player','exams'));
    }

    


    
    //   public function filter(Request $request)
    // {
    //     $query = Player::query();
    
    //     if ($request->birthyear) {
    //         $query->whereHas('birth', function($q) use ($request) {
    //             $q->where('birthyear', $request->birthyear);
    //         });
    //     }
    
    //     if ($request->role) {
    //         $query->whereHas('role', function($q) use ($request) {
    //             $q->where('name', $request->role);
    //         });
    //     }
    
    //     if ($request->governorate) {
    //         $query->where('governorate', $request->governorate);
    //     }
    
    //     if ($request->branch) {
    //         $query->whereHas('branch', function($q) use ($request) {
    //             $q->where('name', $request->branch);
    //         });
    //     }
    
    //     $players = $query->get();
    
    //     return response()->json(['players' => $players]);
    // }
    
    
    public function filter(Request $request)
{
    $query = Player::query();

    if ($request->birthyear) {
        $query->whereHas('birth', function($q) use ($request) {
            $q->where('birthyear', $request->birthyear);
        });
    }

    if ($request->role) {
        $query->whereHas('role', function($q) use ($request) {
            $q->where('name', $request->role);
        });
    }

    if ($request->governorate) {
        $query->where('governorate', $request->governorate);
    }

    if ($request->branch) {
        $query->whereHas('branch', function($q) use ($request) {
            $q->where('name', $request->branch);
        });
    }

    // Paginate the results
    // $players = $query->paginate(10); // Adjust the number as per your needs

    return view('players.index', compact('players'));
}

    
}
