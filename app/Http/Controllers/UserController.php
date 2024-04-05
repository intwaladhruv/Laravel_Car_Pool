<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'firstname' => ['required', 'min:3', 'max:10'],
            'lastname' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6', 'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,}$/i'],
            'gender' => ['required', Rule::in(['Male', 'Female'])],
            'contact_number' => ['required', 'regex:/^\d{10}$/']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);

        auth()->login($user);
        return redirect('/');
        return "loggedin";
    }

    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return redirect('/login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
