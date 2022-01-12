<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Album;
use App\Http\Services\ThumbnailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{

    protected $thumbnailService;

    function __construct(ThumbnailService $thumbnailService){
        $this->thumbnailService = $thumbnailService;
    }

    public function index() {
        return redirect()->route('home');
    }

    public function show(int $id)
    {
        if(Auth::check())
        {
            $publicUser = User::where('id', '=', $id)->first();
            $gravatar = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $publicUser->email ) ) )."?d=mp&s=256";

            $publicAlbums = Album::select('users.first_name', 'users.last_name' ,'albums.*')
                ->where('is_private', '=', 0)
                ->where('id_user', '=', $id)
                ->join('users', 'users.id', '=', 'albums.id_user')
                ->get();

            $publicAlbumsThumbnails = $this->thumbnailService->getThumbnail($publicAlbums);

            return Inertia::render('Profile', [
                "publicUser" => $publicUser,
                "publicAlbums" => $publicAlbums,
                "publicAlbumsThumbnails" => $publicAlbumsThumbnails,
                'gravatar' => $gravatar,
                'user' => Auth::user(),
            ]);
        }
        else
        {
            return redirect()->route('login')->with('error', 'You have to be connected to access this page');
        }
    }

    public function create() {
        return Inertia::render('SignUp');
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

    public function loginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request['email'])->first();

        if($user != null && Hash::check($request['password'], $user['password']))
        {
            Auth::login($user);

            return redirect()->intended('/albums');
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

    public function edit()
    {
        return Inertia::render('UpdateUser', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request, User $user)
    {
        if(isset($request['oldpassword']))
        {
            $request->validate([
                'email' => 'required|email',
                'oldpassword' => 'required',
                'newpassword' => 'required',
            ]);

            if(Hash::check($request['oldpassword'], $user['password']))
            {
                $password = Hash::make($request['newpassword']);

                $request['newpassword'] = $password;

                $user->update([
                    'email' => $request['email'],
                    'password' => $password
                ]);

                Auth::logout();

                return redirect()->route('login')->with('success', 'You can now login with your new password or new email');
            }
            else
            {
                return redirect()->route('updateView', ['user' => $user])->with('error', 'Invalid password');
            }
        }
        else
        {
            $user->update($request->all());

            return redirect()->route('users.show', ['user' => $user->id]);
        }
    }

    public function login()
    {
        return Inertia::render('Login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route("home");
    }
}


