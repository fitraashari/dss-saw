<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessment;
use App\Criteria;
use App\Employe;
Use Alert;
class AssessmentController extends Controller
{
    public function index(){
        $criterias = Criteria::orderBy('criteria_code','Asc')->with('sub_criteria')->get();
        $employes = Employe::orderBy('id','Asc')->with('assessment')->get(); 
        $arr = [];
        $score=[];
        $minmax =  Assessment::getMaxMin($criterias);
        foreach($employes as $index => $employe){
            $arr[$index] =[
                'full_name'=>$employe->full_name
            ];
             foreach($criterias as $key => $criteria){
                 foreach($employe->assessment as $assessment){
                    if($assessment->criteria_id==$criteria->id){
                        $arr[$index]['criteria'][$criteria->criteria_code]=[
                            'name'=>$criteria->name,
                            'type'=>$criteria->type,
                            'weight'=>$assessment->weight,
                        ];
                        if ($criteria->type=='benefit') {
                            $result=$assessment->weight/$minmax[$criteria->criteria_code]['max_weight'];
                        }else{
                            $result=$minmax[$criteria->criteria_code]['min_weight']/$assessment->weight;
                        }
                        $arr[$index]['criteria'][$criteria->criteria_code]['result'] = $result;
                        $score[$index][]=$result*$criteria->weight;
                    }
                }
            }
            $arr[$index]['score']=array_sum($score[$index]);
        }
        foreach ($arr as $key => $row)
            {
                $score[$key] = $row['score'];
            }
        array_multisort($score, SORT_DESC, $arr);
        // return Assessment::getMaxMin($criterias);
        return view('dashboard.admin.assessment.index',compact('criterias','employes','arr'));
        
    }
    public function store(Request $request){
        // return $request->all();
        request()->validate([
            'criteria_id'=>['required'],
            'weight'=>['required']
        ]);
        $arr=[];
        foreach($request['criteria_id'] as $index => $criteria_id){
            $arr[]=[
                'employe_id'=>$request['employe_id'],
                'criteria_id'=>$criteria_id,
                'weight'=>$request['weight'][$index]
            ];
        }
        // return $arr;
        foreach($arr as $data){
            try {
                Assessment::updateOrCreate([
                'employe_id'=>$request['employe_id'],
                'criteria_id'=>$data['criteria_id'],
                ],[
                'weight'=>$data['weight']
                ]);
            } catch (\Throwable $th) {
                // return $th;
                return redirect()->route('assessment')->withErrors('Error');
            }
        }
        return redirect()->route('assessment')->withSuccess('Success');
    }

    
}
