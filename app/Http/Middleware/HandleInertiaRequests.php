<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'flash' => function() use ($request){
                return [
                    'error' => $request->session()->get('error'),
                ];
            },
        ]);
    }
}
