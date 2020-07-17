<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
