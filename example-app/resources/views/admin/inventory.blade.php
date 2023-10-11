@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <h2>Listado de Productos</h2>
        <div class="row">
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Creador</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <th scope="row">{{ $producto->id }}</th>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->user->name }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td class="d-flex flex-row">
                                <a href=""> <span
                                        class="px-2"> <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>
                                    </span> </a>
                                <form method="post"
                                    action="">
                                    @csrf
                                    @method('delete')
                                    <span>
                                        <button type="submit" value="Delete" class="bg-transparent border-0">
                                            <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                        </button>
                                    </span>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
