<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function userIndex()
    {
        $users = User::where('role', 'usuario')->paginate(5);
        if ($users->isEmpty())
        {
            return view('admin.userlist', ['users' => null]);
        }
        return view('admin.userlist', ['users' => $users]);
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'password2' => 'required|string'
        ]);

        if($request->password != $request->password2)
        {
            return back()->with('message1', 'Las contraseñas no coinciden');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'usuario'
        ]);

        return back();
    }

    public function inventoryIndex()
    {
        $productos = Producto::paginate(5);
        return view('admin.inventory', ['productos' => $productos]);
    }
}
