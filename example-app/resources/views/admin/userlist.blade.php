@extends('auth.layout')

@section('content')
    <div class="mt-5">
        @if (Session::has('message1'))
            <p class="text-danger">{{ session('message1') }}</p>
        @endif
        @if ($users == null)
            <h2>No hay resultados para mostrar</h2>
        @else
            @foreach ($users as $user)
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col d-inline-flex align-items-center justify-content-left">
                                <i class="fa-solid fa-user fa-2x"></i>
                                <h5 class="font-primary mx-2">Nombre: {{ $user->name }}</h5>
                            </div>
                            <div class="col">
                                <h5 class="font-primary">Correo: {{ $user->email }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $users->links() }}
        @endif
        <!-- Collapse -->
        <div class="row mt-5">
            <p class="d-inline-flex gap-1">
                <button class="btn btn-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Crear Usuario
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body background-cardtitle">
                    <form class="needs-validation" action="{{ route('admin-users.create') }}" method="post" novalidate>
                        @csrf
                        @method('POST')
                        <div class="mb-3 row-col">
                            <label for="validationCustom01" class="form-label">Nombre</label>
                            <input name="name" type="text" class="form-control" id="validationCustom01"
                                placeholder="Nombre" required>
                            <div class="valid-feedback">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Campo vacío o incorrecto
                            </div>
                        </div>
                        <div class="mb-3 row-col">
                            <label for="validationCustom02" class="form-label">Correo</label>
                            <input name="email" type="email" class="form-control" id="validationCustom02"
                                placeholder="correo@correo.com" required>
                            <div class="valid-feedback">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Campo vacío o incorrecto
                            </div>
                        </div>
                        <div class="mb-3 row-col">
                            <label for="validationCustom03" class="form-label">Contraseña</label>
                            <input minlength="6" name="password" type="password" class="form-control"
                                id="validationCustom03" required>
                            <div class="valid-feedback">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Campo vacío o incorrecto (Mínimo 6 dígitos)
                            </div>
                        </div>
                        <div class="mb-3 row-col">
                            <label for="validationCustom04" class="form-label">Confirmar contraseña</label>
                            <input minlength="6" name="password2" type="password" class="form-control"
                                id="validationCustom04" required>
                            <div class="valid-feedback">
                                Correcto
                            </div>
                            <div class="invalid-feedback">
                                Campo vacío o incorrecto (Mínimo 6 dígitos)
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
