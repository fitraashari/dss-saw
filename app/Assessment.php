<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    //
    protected $guarded = [];
    
    public static function getMaxMin($criterias){
        $arr=[];
        foreach ($criterias as $key => $criteria) {
        $decoded = json_decode($criteria->assessment,true);
        $arr[$criteria['criteria_code']]=[
        'name'=>$criteria['name'],
        'type'=>$criteria['type'],'max_weight'=>max(array_column($decoded, 'weight')),
        'min_weight'=>min(array_column($decoded, 'weight'))] ;
        }
        return $arr;
    }
}
