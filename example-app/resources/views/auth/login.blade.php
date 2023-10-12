@extends('auth.layout')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header background-cardtitle font-primary fw-bold">Inicio de Sesión</div>
                <div class="card-body background-lighter">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <img src="https://orangedog.co.nz/cdn/shop/products/Pens.png?v=1603335646" class="img-fluid object-fit-scale" alt="logo">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 ">
                            @if(Session::has('message2'))
                                <p class="text-success">{{ session('message2') }}</p>
                            @endif
                            <form class="needs-validation" action="{{ route('authenticate') }}" method="post" novalidate>
                                @csrf
                                @method("POST")
                                <div class="mb-3 row-col">
                                    <label for="validationCustom01" class="form-label">Correo</label>
                                    <input name="email" type="email" class="form-control" id="validationCustom01"
                                        placeholder="correo@correo.com" required>
                                    <div class="valid-feedback">
                                        Correcto
                                    </div>
                                    <div class="invalid-feedback">
                                        Campo vacío o incorrecto
                                    </div>
                                </div>
                                <div class="mb-3 row-col">
                                    <label for="validationCustom02" class="form-label">Contraseña</label>
                                    <input name="password" type="password" class="form-control" id="validationCustom02" required>
                                    <div class="valid-feedback">
                                        Correcto
                                    </div>
                                    <div class="invalid-feedback">
                                        Campo vacío o incorrecto
                                    </div>
                                </div>
                                @if(Session::has('message1'))
                                    <p class="text-danger">{{ session('message1') }}</p>
                                @endif
                                <div class="mb-3 row d-flex justify-content-center align-content-center">
                                    <button type="submit" class="col-3 btn btn-secondary"> Acceder </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
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
