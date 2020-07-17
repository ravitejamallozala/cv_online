<?php

namespace App\Http\Controllers;

use App\Cv;
use App\Skill;
use App\User;
use Illuminate\Http\Request;

class CvController extends Controller
{

    public function show(User $user)
    {
        return view('cv.create', compact("user"));

    }

    public function delete(User $user)
    {
        $user = auth()->user();
        if (!is_null($user->cv)) {
            Skill::where('cv_id', $user->cv->id)->delete();
            $user->cv->delete();
        }
        return redirect('/cv/' . auth()->user()->id);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'user_id' => '',
            'work_exp' => 'required',
            'skills' => 'required',
            'current_location' => 'required',
            'education' => 'required',
            'year_of_grad' => ['required', 'digits:4'],
            'projects' => 'required',
        ]);
        $skills_arr = array_map('trim', explode(',', $data['skills']));
        $user = auth()->user();
        $cv_obj = new Cv();
        $cv_obj->work_exp = $data['work_exp'];
        $cv_obj->current_location = $data['current_location'];
        $cv_obj->year_of_grad = $data['year_of_grad'];
        $cv_obj->projects = $data['projects'];
        $cv_obj->education = $data['education'];
        $cv_obj->user_id = $user->id;
//        dd($data);

        if (!is_null($user->cv)) {
            $user->cv()->update([
                'work_exp' => $data['work_exp'],
                'current_location' => $data['current_location'],
                'year_of_grad' => $data['year_of_grad'],
                'projects' => $data['projects'],
                'education' => $data['education']
            ]);
            Skill::where('cv_id', $user->cv->id)->delete();
            foreach ($skills_arr as $skill) {
                $skill_obj = Skill::firstOrNew(['name' => $skill]);
                $skill_obj->cv_id = $user->cv->id;
                $skill_obj->save();
            }
        } else {
            $temp = $user->cv()->create($data);
            foreach ($skills_arr as $skill) {
                $skill_obj = Skill::firstOrNew(['name' => $skill]);
                $skill_obj->cv_id = $temp->id;
                $skill_obj->save();
            }

        }

        return redirect('/');
//        return redirect('/cv/' . auth()->user()->id);

    }
}
