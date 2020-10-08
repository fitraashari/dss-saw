<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Criteria;
use App\SubCriteria;
use App\Assessment;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employe = Employe::get();
        $employe = count($employe);
        $assessment_success =  count(Employe::has('assessment')->get());
        $assessment_pending =  count(Employe::doesntHave('assessment')->get());
        $criteria=Criteria::get();
        $criteria = count($criteria);

        $sub_criteria=SubCriteria::get();
        $sub_criteria = count($sub_criteria);

        return view('dashboard.admin.home',compact('criteria','sub_criteria','employe','assessment_success','assessment_pending'));
    }
}
