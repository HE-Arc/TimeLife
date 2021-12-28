<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{

    public function index()
    {
        return Inertia::render('SignUp', [

        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'description' => '',
        ]);

        User::create($request->all());


        // TODO a message for success create user
        return Inertia::location("/");
    }

    public function profile()
    {
        return Inertia::render('Profile', [

        ]);
    }

    public function loginPost(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where($request->all())->first();

        if($user != null)
        {
            Auth::login($user);

            return redirect()->intended('/profile');
        }
        else
        {
            // TODO a message for error login
            return back()->withErrors([
                'email' => "ERROR",
            ]);
        }
    }



    public function login()
    {
        return Inertia::render('Login', [

        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect("/");
    }
}

Inertia::share('user', fn (Request $request) => $request->user()
        ? $request->user()->only('last_name', 'first_name')
        : null
);
