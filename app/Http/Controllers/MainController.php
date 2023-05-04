<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Subject;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'subjects' => Subject::all(),
        ]);
    }
    public function show(Subject $subject)
    {
        return Inertia::render('Presence', [
            'subject' => $subject,
        ]);
    }
}
