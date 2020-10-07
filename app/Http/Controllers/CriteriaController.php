<?php

namespace App\Http\Controllers;

use App\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    //
    public function index(){
        $data = Criteria::get();
        return view('dashboard.admin.criteria.index',compact('data'));
    }
    public function destroy(Criteria $criteria){
        $criteria->delete();
        return redirect()->route('criteria');
    }
}
