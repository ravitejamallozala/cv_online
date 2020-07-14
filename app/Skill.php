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
    public function user()
    {
        return $this->belongsTo(Cv::class);
    }
}
