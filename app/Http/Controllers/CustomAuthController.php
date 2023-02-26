<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CustomAuthController extends Controller
{
    // Display login form
    public function index() 
    {
        return view('admin.login');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        // Validate request
        $credentials = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        // Attempt to authenticate user
        if(Auth::attempt($credentials)) {
            return redirect()->route('admin.home');
        } else {
            // Return error if authentication fails
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
    }

    // Log out user
    public function signOut() 
    {
        Auth::logout();

        return redirect()->intended('/login');
    }

    // Display registration form
    public function regpage() 
    {
        return view('admin.register');
    }

    // Register user
    public function register(Request $request)
    {  
        // Validate request
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $success = $this->create($data);
         
        if ($success) {
            return redirect()->route('admin.home');
        } else {
            // Return error if registration fails
            throw ValidationException::withMessages([
                'email' => ['An error occurred while registering the user.'],
            ]);
        }
    }

    // Create user in database
    public function create(array $data)
    {
        try {
            return User::create([
                'name' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
        } catch (\Exception $e) {
            // Return false if user could not be created
            return false;
        }
    } 
}
