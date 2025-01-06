<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\PreventCommonPassword;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup()
    {
        return view('auth.signup');
    }

    public function doSignup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('errors', array('message' => $validator));
        } else {
            $user = User::create($request->all());
            return redirect()->route('home.page')->with('success', "Your account created successfully");
        }
    }

    public function signin()
    {
        return view('auth.signin');
    }

    public function doSignin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => ['required', 'min:6'],
            // 'password' => ['required', 'min:6', new PreventCommonPassword],

        ]);
        if ($validator->fails()) {
            return redirect()->back();
        } else {

            $credentials = $request->only('email', 'password');
            if (auth()->attempt($credentials)) {
                return redirect()->route('home.page')->with('success', 'Login successful');
            } else {
                return redirect()->back()->with('error', 'Invalid email or password');
            }

        }
    }

    // Social Login
    public function googlePage()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        // dd($user);
        $finduser = User::where('google_id', $user->id)->first();
        if ($finduser) {
            Auth::login($finduser);
            return to_route('home.page')->with('success', 'Login successful');
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id,
                'password' => encrypt('123456dummy')
            ]);
            Auth::login($newUser);
            return to_route('home.page')->with('success', 'Login successful');

        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home.page')->with('success', 'Logged out successfully');
    }
}
