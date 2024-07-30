<?php

namespace App\Http\Controllers;

use App\Services\GovernorateService;
use App\Models\Player;
use App\Models\Result;
use App\Models\Exam;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct(GovernorateService $governorateService)
    {
        $this->governorateService = $governorateService;
    }

    public function home()
    {
        $governorates = $this->governorateService->getGovernorates();
        return view('WebSite.body', compact('governorates'));
    }

    public function submitGovernorate(Request $request)
    {
        $selectedGovernorate = $request->input('governorate');
        // Handle the selected governorate (e.g., save to database, etc.)
        return back()->with('success', 'Governorate selected: ' . $selectedGovernorate);
    }

    public function inquiry()
    {
        return view('WebSite.inquiry');
    }

//  public function inquireShow(Request $request)
//     {
//         $phone = $request->input('phone');
//         $player = Player::where('phone', $phone)->with('role', 'branch')->first();
//         $results = Result::where('player_id', $player->id)->with('exam')->get();
//         $ONEresults = Result::where('player_id', $player->id)->with('exam')->first();
//         $firstExam = Exam::orderBy('id', 'asc')->first();
//         $nextExam = null;

//         foreach ($results as $result) {
//             if ($result->pass) {
//                 $nextExam = Exam::where('id', '>', $result->exam->id)->orderBy('id')->first();
//                 break;
//             }
//         }

//         return view('WebSite.show_data', compact('player', 'results', 'firstExam', 'nextExam','ONEresults'));
//     }
   



        // public function inquireShow(Request $request)
        // {
        //     $phone = $request->input('phone');
        //     $player = Player::where('phone', $phone)->with('role', 'branch')->first();
        
        //     if (!$player) {
        //         return redirect()->back()->with('error', 'هذا الرقم غير موجود.');
        //     }
        
        //     $results = Result::where('player_id', $player->id)->with('exam')->get();
        //     $firstExam = Exam::orderBy('id', 'asc')->first();
        
        //     // Get the next exam
        //     // $nextExam = Exam::where('id', '>', $firstExam->id)->orderBy('id', 'asc')->first();
        
        //     return view('WebSite.show_data', compact('player', 'results', 'firstExam'));
        // }




    //  public function getNextExam(Request $request)
    // {
    //     $examId = $request->input('exam_id');
    //     $nextExam = Exam::where('id', '>', $examId)->orderBy('id', 'asc')->first();

    //     if ($nextExam) {
    //         if ($nextExam->status == 0) {
    //             return response()->json([
    //                 'success' => true,
    //                 'nextExam' => [
    //                     'status' => $nextExam->status,
    //                     'name' => $nextExam->name,
    //                     'datee' => \Carbon\Carbon::parse($nextExam->datee)->format('d-m-Y'),
    //                     'timee' => \Carbon\Carbon::parse($nextExam->timee)->format('H:i'),
    //                     'location' => $nextExam->location,
    //                 ]
    //             ]);
    //         } elseif ($nextExam->status == 1) {
    //             return response()->json([
    //                 'success' => true,
    //                 'nextExam' => [
    //                     'status' => $nextExam->status,
    //                     'message' => 'لم يتم تحديد الامتحان بعد',
    //                 ]
    //             ]);
    //         }
    //     } else {
    //         return response()->json(['success' => false]);
    //     }
    // }
    
        public function inquireShow(Request $request)
{
    $phone = $request->input('phone');
     $player = Player::where('phone', $phone)->with('role', 'branch')->first();
        
            if (!$player) {
                return redirect()->back()->with('error', 'هذا الرقم غير موجود.');
            }
    $player = Player::where('phone', $phone)->with('role', 'branch')->first();
    $results = Result::where('player_id', $player->id)->with('exam')->get();
    $firstExam = Exam::orderBy('id', 'asc')->first();

    // Get the next exam
   

    return view('WebSite.show_data', compact('player', 'results', 'firstExam'));
}

public function getNextExam(Request $request)
{
    $examId = $request->input('exam_id');
    $nextExam = Exam::where('id', '>', $examId)->orderBy('id', 'asc')->first();

    if ($nextExam) {
        if ($nextExam->status == 0) {
            return response()->json([
                'success' => true,
                'nextExam' => [
                    'status' => $nextExam->status,
                    'name' => $nextExam->name,
                    'datee' => \Carbon\Carbon::parse($nextExam->datee)->format('d-m-Y'),
                    'timee' => \Carbon\Carbon::parse($nextExam->timee)->format('H:i'),
                    'location' => $nextExam->location,
                ]
            ]);
        } elseif ($nextExam->status == 1) {
            return response()->json([
                'success' => true,
                'nextExam' => [
                    'status' => $nextExam->status,
                    'message' => 'لم يتم تحديد الامتحان بعد',
                ]
            ]);
        }
    } else {
        return response()->json(['success' => false]);
    }
}
}




