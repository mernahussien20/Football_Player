<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Player;
use App\Models\Fail;
use App\Models\Result;
use App\Models\Branch;
use App\Models\Da;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::all();
        return view('backend.exams.index' , compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $timeOfdates = Da::all();
       $branches = Branch::all();
        return view('backend.exams.create', compact('timeOfdates','branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data['name'] = $request->input('name') ? $request->input('name') : null;
    $data['timee'] = $request->input('timee') ? $request->input('timee') : null;
    $data['datee'] = $request->input('datee') ? $request->input('datee') : null;
    $data['location'] = $request->input('location') ? $request->input('location') : null;
    $data['branch_id'] = $request->input('branch') ? $request->input('branch') : null;
    $data['status'] = $request->input('status') ? $request->input('status') : '0';
    //dd($data);
    Exam::create($data);

    return redirect()->route('exams.index')->with('message', "تم إضافة الاختبار بنجاح");
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $player  = Player::find($id);
        $exams = Exam::all();
        return  view('backend.exams.show' , compact('exams','player'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $exam =Exam::find($id);
        $timeOfdates = Da::all();
        $branches = Branch::all();
        return view('backend.exams.edit' , compact('exam','timeOfdates','branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       // dd($request);
        $exam = Exam::findOrFail($id);
        $exam->update([
            'name' => $request->name,
            'timee' => $request->timee ,
            'datee' =>$request->datee ,
            'branch_id' =>  $request->branch,
            'location' =>  $request->location,
            'status' => $request->status ? $request->status : '0',
        ]);
        return redirect()->route('exams.index')->with('message', "تم تعديل الاختبار بنجاح");
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,$id)
    {
        Exam::find($id)->delete();
        return redirect()->route('exams.index')->with('message' , "تم إزالة الاختبار بنجاح");
    }


    public function storeExam(Request $request)
{
    $validatedData = $request->validate([
        'exam_id' => 'required|exists:exams,id',
        'player_id' => 'required|exists:players,id',
        'status' => 'required|string'
    ]);

    $status = $validatedData['status'];

    // Update or create the exam result
    $result = Result::updateOrCreate(
        [
            'exam_id' => $validatedData['exam_id'],
            'player_id' => $validatedData['player_id']
        ],
        [
            'pass' => $status === 'ناجح' ? 1 : 0,
            'fail' => $status === 'راسب' ? 1 : 0,
            'pending' => $status === 'غياب' ? 1 : 0
        ]
    );

    // Check if the status is "غياب" or "راسب"
    if (in_array($status, ['غياب', 'راسب'])) {
        // Update the player's status column to 1
        $player = Player::find($validatedData['player_id']);
        $player->update(['status' => 1]);
    }

    return redirect()->route('players.show', $validatedData['player_id'])
                     ->with('message', 'تم');
}

    
    public function showNextExam($player_id, $current_exam_id)
    {
        // Fetch the current exam
        $currentExam = Exam::find($current_exam_id);
        
        // Fetch the next exam for the player
        $nextExam = Exam::where('id', '>', $current_exam_id)->orderBy('id')->first();
        
       
           
            return view('WebSite.next_exam', compact('nextExam'));
        
    }
}
