<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view("CRUD.users.register");
    }

    public function store(Request $request)
    {
        $formvalid = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:6'
        ]);
        
        $formvalid['password'] = bcrypt($formvalid['password']);
        $user = User::create($formvalid);
        auth()->login($user);
        
        return redirect('CRUD/users/login')->with('success', 'Registration successful');
    }

    public function login()
    {
        return view("CRUD.users.login");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logout successful');

    }
    public function authenticate(Request $request)
    {
        $formvalid = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (auth()->attempt($formvalid)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Login successful');
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.'])->with('error', 'Invalid credentials');
    }

    public function profile()
    {
        return view("CRUD.users.profile");
    }
    public function manage()
    {
        $products = Product::where('user_id', auth()->id())->get();
        return view('CRUD.product.manage', compact('products'));
    }
}