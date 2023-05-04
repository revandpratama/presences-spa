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
}
