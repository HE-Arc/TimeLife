<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
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

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = User::where($request->all());

        if($user != null)
        {
            // TODO a message for success login
            return Inertia::location("/");
        }
        else
        {
            // TODO a ,message for error login
            return Inertia::render('Login', [

            ]);
        }
    }

    public function login()
    {
        return Inertia::render('Login', [

        ]);
    }
}
