<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model 
{

    /**
     * The attributes that are guarded from mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

}
