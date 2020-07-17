<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
