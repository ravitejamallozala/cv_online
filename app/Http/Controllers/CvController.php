<?php

namespace App\Http\Controllers;

use App\Cv;
use App\Skill;
use App\User;
use Illuminate\Http\Request;

class CvController extends Controller
{

    public function create()
    {
        return view('cv.create');

    }

    public function store()
    {
        $data = request()->validate([
            'user_id' => '',
            'work_exp' => 'required',
            'skills' => 'required',
            'current_location' => 'required',
            'education' => 'required',
            'year_of_grad' => ['required', 'digits:4'],
            'projects' => 'required',
        ]);
//        dd("its here");
        $skills_arr = array_map('trim', explode(',', $data['skills']));
        $user = auth()->user();
        $cv_obj = new Cv();
        $cv_obj->work_exp = $data['work_exp'];
        $cv_obj->current_location = $data['current_location'];
        $cv_obj->year_of_grad = $data['year_of_grad'];
        $cv_obj->projects = $data['projects'];
        $cv_obj->education = $data['education'];
        $cv_obj->user_id = $user->id;
        $cv_obj->save();

        foreach ($skills_arr as $skill) {
            $skill_obj = Skill::firstOrNew(['name' => $skill]);
            $skill_obj->cv_id = $cv_obj->id;
            $skill_obj->save();
        }

        return redirect('/profile/' . auth()->user()->id);

    }
}
