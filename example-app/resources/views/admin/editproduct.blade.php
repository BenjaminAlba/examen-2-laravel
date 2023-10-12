@extends('auth.layout')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header background-cardtitle font-primary fw-bold">Modificar Producto</div>
                <div class="card-body background-lighter">
                    <div class="row">
                        <form class="needs-validation" action="{{ route('admin-inventory.update', ['producto' => $producto]) }}" method="post"
                            novalidate>
                            @csrf
                            @method('put')
                            <div class="mb-3 row-col">
                                <label for="validationCustom01" class="form-label">Nombre</label>
                                <input name="nombre" type="text" class="form-control" id="validationCustom01"
                                    placeholder="{{ $producto->nombre }}" required>
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
                                <div class="valid-feedback">
                                    Correcto (El campo puede estar vacío)
                                </div>
                            </div>
                            <div class="mb-3 row-col">
                                <label for="validationCustom03" class="form-label">Precio</label>
                                <input name="precio" type="number" class="form-control" id="validationCustom03"
                                    step="any" pattern="^\d*(\.\d{1,2})?$">
                                <div class="valid-feedback">
                                    Correcto (El campo puede estar vacío)
                                </div>
                            </div>
                            <div class="mb-3 row d-flex justify-content-center align-content-center">
                                <button type="submit" class="col-3 btn btn-secondary"> Modificar Producto </button>
                            </div>
                        </form>
                    </div>
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
