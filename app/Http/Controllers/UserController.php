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

        if(User::where(['email' => $request['email']])->first() != null)
        {
            return Inertia::render('SignUp', [
                'error' => "Email existing",
            ]);
        }
        else{
            User::create($request->all());

            return redirect('/success');
        }

    }

    public function profil()
    {
        return Inertia::render('Profil', [

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

            return redirect()->intended('/profil');
        }
        else
        {
            // TODO a message for error login
            return Inertia::render('Login', [
                'error' => "Mail or Password invalid"
            ]);
        }
    }



    public function login()
    {
        return Inertia::render('Login', [
            'error' => null,
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
