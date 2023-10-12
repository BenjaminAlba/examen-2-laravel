<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout'
        ]);
    }
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        Log::info($request);  

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            session(['passwordXD' => $request->password]);

            if(Auth::user()->role == "administrador"){
                return redirect()->route('admin-dashboard');
            }
            else if(Auth::user()->role == "usuario"){
                return redirect()->route('user-dashboard');
            }

            return redirect()->route('landing-login');
        }

        return redirect()->route('landing-login')->with('message1', 'Credenciales inválidas, inténtelo de nuevo.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing-login')->with('message2', 'Cierre de sesión exitoso.');
    }
}
