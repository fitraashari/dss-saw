<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    //
    protected $guarded = [];
    public function assessment()
    {
        return $this->hasMany('App\Assessment');
    }
}
