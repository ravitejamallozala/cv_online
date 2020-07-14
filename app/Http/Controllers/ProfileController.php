<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(User $user)
    {
        return view('user.profile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
//         Write Updating logic here get user id and update fields in that User table
//        dd($request);
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'username'=> 'required',
            'password'=> 'required',
            'usertype'=> 'required',
        ]);
        auth()->user()->update($data);
        return redirect("/profile/{$user->id}");
    }

}
