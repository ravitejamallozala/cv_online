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

    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('profile', [
            'user' => $user,
        ]);
    }
    public function update(Request $request, $user_id)
    {
        dd($request);
        echo "IN Update method";
//        dd($userd);
//        $user = User::find($user_id);
//        return view('profile', [
//            'user' => $user,
//        ]);
        return view('home');
    }


}
