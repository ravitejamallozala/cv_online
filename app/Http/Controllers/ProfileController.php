<?php

namespace App\Http\Controllers;

use App\Cv;
use App\Skill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function candidates()
    {
        $user = auth()->user();
        $this->authorize('view', $user);
        $users = User::where('usertype', 'Candidate')->get();
        return view('user.candidates', compact("users"));
    }

    public function detail(User $user)
    {
        $this->authorize('view', $user);
        return view('user.detail', compact("user"));
    }

    public function show(User $user)
    {
        $this->authorize('update', $user);
        return view('user.profile', [
            'user' => $user,
        ]);
    }

    public function search(Request $request)
    {
        if (is_null($request->data)) {
            $users = User::where('usertype', 'Candidate')->get();
            return view('user.candidates', compact("users"));
        }
        $data = $request->data;
        $skills_arr = array_map('trim', explode(',', $data));
        $cv_ids = Skill::whereIn('name', $skills_arr)->has('cv')->select('cv_id')->get()->toArray();
        $cv_arr = [];
        foreach ($cv_ids as $cv) {
            array_push($cv_arr, $cv['cv_id']);
        }
        $user_ids = Cv::whereIn('id', $cv_arr)->has('user')->select('user_id')->get()->toArray();
        $user_arr = [];
        foreach ($user_ids as $u) {
            array_push($user_arr, $u['user_id']);
        }

        $users = User::orWhereIn('id', $user_arr)->orWhereIn('name', $skills_arr)->get();

        return view('user.candidates', compact("users"));

    }

    public function update(Request $request, User $user)
    {
//         Write Updating logic here get user id and update fields in that User table
//        dd($request);
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'usertype' => 'required',
        ]);
        auth()->user()->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'usertype' => $data['usertype'],
        ]);
        return redirect("/profile/{$user->id}");
    }

}
