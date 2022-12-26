<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as Enter;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{
    // Show Registser/Create Form
    public function create() {
        return view('users.register');
    }

    // Store/Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);
    
        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = Enter::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out successfully.');
    }

    // Show Login form
    public function login() {
        return view('users.login');
    }

        // Show Authenticate User
        public function authenticate(Request $request) {
            $formFields = $request->validate([
                'email' => ['required', 'email'],
                'password' => 'required'
            ]);

            if(auth()->attempt($formFields)) {
                $request->session()->regenerate();

                return redirect('/')->with('message', 'You are now logged in!');
            }

            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }
}
