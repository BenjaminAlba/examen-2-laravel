<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class ProductoController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'cantidad' => 'nullable|numeric',
            'precio' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);
        
        $data['id_usuario'] = Auth::id();

        if($request->input('precio') == null)
        {
            $dataPartial = Arr::except($data, 'precio');
            Producto::create($dataPartial);
        }
        else
            Producto::create($data);

        return back()->with('message1', 'Producto añadido con éxito.');
    }

    public function delete(Producto $producto)
    {
        $producto->delete();
        return back()->with('message2', 'Producto eliminado con éxito.');
    }

    public function edit(Producto $producto)
    {
        if(Auth::user()->role == "administrador")
            return view('admin.editproduct', ['producto' => $producto]);
        elseif(Auth::user()->role == "usuario")
            return view('user.editproduct', ['producto' => $producto]);
    }

    public function update(Producto $producto, Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string',
            'cantidad' => 'nullable|numeric',
            'precio' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        if($request->input('precio') == null)
        {
            $dataPartial = Arr::except($data, 'precio');
            $producto->update($dataPartial);
        }
        else
            $producto->update($data);

        if(Auth::user()->role == "administrador")
            return redirect()->route("admin-inventory");
        else if(Auth::user()->role == "usuario")
            return redirect()->route("user-personalInventory");
    }
}
