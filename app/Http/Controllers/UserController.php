<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Album;

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

    public function profile($id)
    {
        if(Auth::check())
        {
            $publicUser = User::where('id', '=', $id)->first();
            $publicAlbums = Album::where('id_user', '=', $id)->get();

            return Inertia::render('Profile', [
                "publicUser" => $publicUser,
                "publicAlbums" => $publicAlbums,
                'user' => Auth::user(),
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

            return redirect()->intended('/album');
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

    public function updateView()
    {
        return Inertia::render('UpdateUser', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('profile', ['id' => $user->id]);
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


