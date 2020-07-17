<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //

    protected $guarded = [];
    protected $fillable = [
        'title', 'description', 'salary', 'type', 'company_name', 'city', 'creation_date', 'expiry_date'
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
