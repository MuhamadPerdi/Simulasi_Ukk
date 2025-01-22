<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function dashboard(){
        $inventaris = Inventaris::count();
        $peminjaman = Peminjaman::count();
        return view('dashboard',compact('inventaris','peminjaman'));
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required|min:6',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $credentials = $request->only('password');
    
      
        if (filter_var($request->login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->login;
        } else {
            $credentials['name'] = $request->login; // Assuming the username field is `name`
        }
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }
    
        return redirect()->back()
            ->with('error', 'Nama atau email, atau password salah.')
            ->withInput();
    }
    

    /**
     * Handle logout request.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
