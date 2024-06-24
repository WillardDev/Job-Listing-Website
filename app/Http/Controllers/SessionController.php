<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store() {
        // validate
        $attrs = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // attempt to login the user
        if (! Auth::attempt($attrs)) {
            throw ValidationException::withMessages([
                'email' => "Sorry those credentials don't match!"
            ]);
        }

        // regenerate the session token
        request()->session()->regenerate();

        // redirect
        return redirect('/jobs');
    }

    public function destroy() {
        Auth::logout();

        return redirect('/');
    }
}
