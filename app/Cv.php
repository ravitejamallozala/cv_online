<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    //
    protected $guarded = [];
    protected $fillable = [
        'work_exp', 'current_location', 'education', 'year_of_grad', 'projects', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }
}
