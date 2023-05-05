<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Subject;
use App\Models\Presence;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {    
        $presenceFilled = Presence::where('user_id', auth()->user()->id)->get(['appointment', 'subject_id'])->groupBy('subject_id');
        // foreach ($presences as $presence) {
        //     foreach ($presence as $x){
        //         $presenceFilled[] =  $x;
        //     }
            
        // }
        // print_r($presenceFilled);
        return Inertia::render('Dashboard', [
            'subjects' => Subject::all(),
            'presenceFilled' => $presenceFilled
        ]);
    }
}
