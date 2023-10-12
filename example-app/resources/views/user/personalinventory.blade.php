@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <h2>Inventario Personal</h2>
        @if(Session::has('message1'))
        <div class="row d-flex flex-row-reverse">
            <p class="text-success">{{ session('message1') }}</p>
        </div>
        @endif
        @if(Session::has('message2'))
        <div class="row d-flex flex-row-reverse">
            <p class="text-success">{{ session('message2') }}</p>
        </div>
        @endif
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
                            <td>{{ $producto->usuario->name }}</td>
                            @if($producto->cantidad != null)
                                <td>{{ $producto->cantidad }}</td>
                            @else
                                <td>Sin existencias</td>
                            @endif
                            <td>{{ $producto->precio }}</td>
                            <td class="d-flex flex-row">
                                <a href="{{ route('user-personalInventory.edit', ['producto' => $producto]) }}"> <span
                                        class="px-2"> <i class="fa-solid fa-pen-to-square" style="color: #000000;"></i>
                                    </span> </a>
                                <form method="post"
                                    action="{{ route('user-personalInventory.delete', ['producto' => $producto]) }}">
                                    @csrf
                                    @method('delete')
                                    <span>
                                        <button type="submit" value="Delete" class="bg-transparent border-0">
                                            <i class="fa-solid fa-trash" style="color: #000000;"></i>
                                        </button>
                                    </span>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $productos->links() }}
        <!-- Collapse -->
        <div class="row mt-5">
            <p class="d-inline-flex gap-1">
                <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Crear Producto
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body background-cardtitle">
                    <form class="needs-validation" action="{{ route('user-personalInventory.create') }}" method="post" novalidate>
                        @csrf
                        @method('POST')
                        <div class="mb-3 row-col">
                            <label for="validationCustom01" class="form-label">Nombre</label>
                            <input name="nombre" type="text" class="form-control" id="validationCustom01"
                                placeholder="Nombre" required>
                            <div class="valid-feedback">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Campo vacío o incorrecto
                            </div>
                        </div>
                        <div class="mb-3 row-col">
                            <label for="validationCustom02" class="form-label">Cantidad</label>
                            <input name="cantidad" type="number" class="form-control" id="validationCustom02">
                            <!--???-->
                            <div class="valid-feedback">
                                Correcto (El campo puede estar vacío)
                            </div>
                        </div>
                        <div class="mb-3 row-col">
                            <label for="validationCustom03" class="form-label">Precio</label>
                            <input  name="precio" type="number" class="form-control" id="validationCustom03"
                                    step="any" pattern="^\d*(\.\d{1,2})?$">
                            <!---->
                            <div class="valid-feedback">
                                Correcto (El campo puede estar vacío)
                            </div>
                        </div>
                        <div class="mb-3 row d-flex justify-content-center align-content-center">
                            <button type="submit" class="col-3 btn btn-secondary"> Crear </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection