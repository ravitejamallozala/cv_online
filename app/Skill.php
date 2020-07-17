<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $fillable = [
        'name', 'user_id'
    ];
    protected $guarded = [];
    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
