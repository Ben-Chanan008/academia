<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function index ()
    {
        return view('user.login');
    }
    public function register ()
    {
        return view('user.register');
    }

    public function authenticate (Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:16']
        ]);

        $user_type = User::where('email', $fields['email'])->first();

        if($user_type)
            if($user_type->provider != null){
                return response(['message' => "You Created Account with $user_type->provider"], 400);
            } else{
                if(auth()->attempt($fields)){
                    $request->session()->regenerate();
                    return response(['redirect' => '/', 'message' => 'Login Successful... Please Wait'], 200);
                } else{
                    return response(['message' => 'Information Is Wrong'], 400);
                }
            }
        else
            return response(['message' => 'An Error Occurred'], 422);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => ['required', 'min:8', 'max:16'],
            'phone' => ['required']
        ]);


        $user_exists = User::where('email', $fields['email'])->first();

        if($user_exists)
            return response(['message' => 'Account already exists!'], 400);
        else{
            $user = User::create($fields);

            auth()->login($user);

            return response(['redirect' => '/', 'message' => 'Account Created Successfully'], 200);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/login')->with('You\'re Logged out!');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function update_profile(Request $request, User $user)
    {
//        $update = $request->all();
//
//        $user =
//
//
//        $user->update($update);
//
//        return redirect('/user/profile');
    }
}
