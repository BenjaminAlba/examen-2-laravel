<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Producto;

class UserController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function globalInventoryIndex()
    {
        $productos = Producto::with('usuario')->paginate(5);
        return view('user.globalinventory', ['productos' => $productos]);
    }

    public function personalInventoryIndex()
    {
        $userId = Auth::id();

        $productos = Producto::with('usuario')
            ->where('id_usuario', $userId)
            ->paginate(5);
        
        return view('user.personalinventory', ['productos' => $productos]);
    }

    public function credentialsIndex()
    {
        return view('user.editpassword', ["passwordXD" => session("passwordXD")]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
            'password2' => 'required|string'
        ]);

        if($request->password != $request->password2)
        {
            return back()->with('message1', 'Las contraseñas no coinciden');
        }

        $user = Auth::user();
        $user->update([
            'password' => bcrypt($request->password),
        ]);

        session(['passwordXD' => $request->password]);

        return back()->with('message2', 'Contraseña cambiada con éxito');
    }
}