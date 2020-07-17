<?php

namespace App\Http\Controllers;

use App\Job;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class JobController extends Controller
{
    //
    public function show(User $user){
        return view('job.create', compact("user"));
    }
    public function update(Request $request, User $user){
//        dd("Hellosss");
        $data = $request->validate([
            'title'=>['required', 'string', 'max:255'],
            'description'=>['required', 'string', 'max:255'],
            'salary'=>['required', 'integer'],
            'skills' => 'required',
            'type'=>['required', 'string', 'max:255'],
            'company_name'=>['required', 'string', 'max:255'],
            'city'=>['required', 'string', 'max:255'],
            'creation_date'=>['required', 'date_format:Y-m-d'],
            'expiry_date'=>['required', 'date_format:Y-m-d'],
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
        $job->creation_date = date('Y-m-d', strtotime($data['creation_date']));
        $job->expiry_date = date('Y-m-d', strtotime($data['expiry_date']));
    }
}
