<?php

namespace App\Http\Controllers;

use App\Criteria;
use Illuminate\Http\Request;
Use Alert;

class CriteriaController extends Controller
{
    //
    public function index(){
        $data = Criteria::get();
        return view('dashboard.admin.criteria.index', compact('data'));
    }
    public function destroy(Criteria $criteria){
        $criteria->delete();
        return redirect()->route('criteria');
    }
    public function create(Request $request){
        request()->validate([
            'criteria_code'=>['required','unique:criterias,criteria_code'],
            'name'=>['required'],
            'type'=>['required','in:benefit,cost'],
            'weight'=>['required']
        ]);
    }
}
