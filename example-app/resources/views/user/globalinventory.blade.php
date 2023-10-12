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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <th scope="row">{{ $producto->id }}</th>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->usuario->name }}</td>
                            @if($producto->cantidad != null)
                                <td>{{ $producto->cantidad }}</td>
                            @else
                                <td>Sin existencias</td>
                            @endif
                            <td>{{ $producto->precio }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $productos->links() }}
    </div>
@endsection