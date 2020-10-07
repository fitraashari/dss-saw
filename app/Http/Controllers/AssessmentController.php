<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;

class AssessmentController extends Controller
{
    public function index(){
        
        return view('dashboard.assessments.index');
        
    }
}
