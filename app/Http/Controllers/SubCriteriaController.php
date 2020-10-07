<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCriteria;
class SubCriteriaController extends Controller
{
    public function store(Request $request){
        request()->validate([
            'criteria_id'=>['required'],
            'name'=>['required'],
            'weight'=>['required','digits_between:1,5']
        ]);
        $sub_criteria = SubCriteria::create([
            'criteria_id'=>request('criteria_id'),
            'name'=>request('name'),
            'weight'=>request('weight')
        ]);
        return redirect()->route('criteria.show',['id'=>request('criteria_id')])->withSuccess('Add New Sub Criteria Success');
    }
    public function destroy(SubCriteria $sub_criteria,Request $request){
        $sub_criteria->delete();
        return redirect()->route('criteria.show',['id'=>request('criteria_id')])->withSuccess('Delete Sub Criteria Success');
    }
    public function edit($id){
        $sub_criteria = SubCriteria::findOrFail($id);
        return view('dashboard.admin.criteria.sub_criteria.edit',compact('sub_criteria'));
    }
    public function update($id,Request $request){
        $sub_criteria = SubCriteria::findOrFail($id);
        $sub_criteria->update([
            'name'=>request('name'),
            'weight'=>request('weight')
        ]);
        return redirect()->route('criteria.show',['id'=>request('criteria_id')])->withSuccess('Edit Sub Criteria Success');
    }
}
