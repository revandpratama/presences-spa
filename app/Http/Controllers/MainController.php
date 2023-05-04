<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Inertia\Inertia;
use App\Models\Subject;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return Inertia::render('Home', [
            'subjects' => Subject::all(),
        ]);
    }
    public function show(Subject $subject)
    {
        $presences = Presence::where('user_id', auth()->user()->id)->where('subject_id', $subject->id)->get('appointment');
        $presenceFilled = [];
        foreach($presences as $filled) {
            $presenceFilled[] = $filled->appointment;
        }
        return Inertia::render('Presence', [
            'subject' => $subject,
            'presenceFilled' => $presenceFilled,
        ]);
    }

    public function store(Request $request) 
    {

        $validatedData = $request->validate([
            'appointment' => 'required',
            'user_id' => 'required',
            'subject_id' => 'required',
            'status' => 'required',
        ]);



        


        // // $alreadyExists = Presence::where('user_id', $request->user_id)->where('subject_id', $request->subject_id)->exists();

        if(Presence::where('user_id', $request->user_id)->where('subject_id', $request->subject_id)->where('appointment', $request->appointment)->exists()){

            return redirect('/home')->with('presenceSuccess', 'Presence Already Filled!');
        }
        
        Presence::create($validatedData);

        return redirect('/home')->with('presenceSuccess', 'Presence Success!');
        
    }
}
