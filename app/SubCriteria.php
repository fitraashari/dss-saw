<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    //
    protected $guarded = [];
    public function criteria()
    {
        return $this->belongsTo('App\Criteria');
    }
}
