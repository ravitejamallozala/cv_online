<?php

namespace App\Http\Controllers;

use App\Job;
use App\Skill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class JobController extends Controller
{
    //
    public function show(User $user)
    {

        $u = Auth::user();
        if(is_null($u)){
            $this->authorize('view', $user->job);
        }
//        dd(!is_null($u->cv) );
//                  false                Yrue
        if (!is_null($user->job) or $user->id != $u->id) {
            $this->authorize('view', $user->job);
        }
        return view('job.create', compact("user"));
    }
    public function delete(User $user)
    {$u = Auth::user();
        if(is_null($u)){
            $this->authorize('view', $user->job);
        }
//        dd(!is_null($u->cv) );
//                  false                Yrue
        if (!is_null($user->job) or $user->id != $u->id) {
            $this->authorize('view', $user->job);
        }
        $user = auth()->user();
        if (!is_null($user->job)) {
            Skill::where('job_id', $user->job->id)->delete();
            $user->job->delete();
        }
        return redirect('/job/' . auth()->user()->id);
    }

    public function jobs()
    {
        $users = User::where('usertype', 'Company')->get();
        return view('job.jobs', compact("users"));
    }

    public function detail(User $user)
    {
        return view('job.detail', compact("user"));
    }


    public function update(Request $request, User $user)
    {
//        dd("Hellosss");
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'salary' => ['required', 'integer'],
            'skills' => 'required',
            'type' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'creation_date' => ['required', 'date_format:Y-m-d'],
            'expiry_date' => ['required', 'date_format:Y-m-d'],
        ]);
        $skills_arr = array_map('trim', explode(',', $data['skills']));
        $user = auth()->user();
        $job = new Job();
        $job->title = $data['title'];
        $job->description = $data['description'];
        $job->salary = $data['salary'];
        $job->type = $data['type'];
        $job->company_name = $data['company_name'];
        $job->city = $data['city'];
        $creation_date = date('Y-m-d', strtotime($data['creation_date']));
        $expiry_date = date('Y-m-d', strtotime($data['expiry_date']));
        $job->creation_date = $creation_date;
        $job->expiry_date = $expiry_date;

        if (!is_null($user->job)) {
            $user->job()->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'salary' => $data['salary'],
                'type' => $data['type'],
                'company_name' => $data['company_name'],
                'city' => $data['city'],
                'creation_date' => $creation_date,
                'expiry_date' => $expiry_date
            ]);
            Skill::where('job_id', $user->job->id)->delete();
            foreach ($skills_arr as $skill) {
                $skill_obj = Skill::firstOrNew(['name' => $skill]);
                $skill_obj->job_id = $user->job->id;
                $skill_obj->save();
            }
        } else {
            $temp = $user->job()->create($data);
            foreach ($skills_arr as $skill) {
                $skill_obj = Skill::firstOrNew(['name' => $skill]);
                $skill_obj->job_id = $temp->id;
                $skill_obj->save();
            }
        }
        return redirect('/job/' . auth()->user()->id);

    }
}
