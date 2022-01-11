<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'description' => 'nullable',
        ]);

        if($request['description'] === null)
            $request['description'] = " ";

        $password = Hash::make($request['password']);

        $request['password'] = $password;

        User::create($request->all());

        return redirect()->route('home')->with('success', 'You have successfully created your account ! You can now login');

    }

    public function profil()
    {
        if(Auth::check())
        {
            return Inertia::render('Profil', [

            ]);
        }
        else
        {
            return redirect()->route('login')->with('error', 'You have to be connected to access this page');
        }
    }

    public function loginCheck(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request['email'])->first();

        if($user != null && Hash::check($request['password'], $user['password']))
        {
            Auth::login($user);

            return redirect()->intended('/profil');
        }
        else
        {
            // TODO a message for error login
            return redirect()->back()->with('error','Mail or Password invalid');
            /*return Inertia::render('Login', [
                'error' => "Mail or Password invalid"
            ]);*/
        }
    }



    public function login()
    {
        return Inertia::render('Login');
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


