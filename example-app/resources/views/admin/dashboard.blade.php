@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <img height="500" src="https://icon-library.com/images/admin-user-icon/admin-user-icon-4.jpg" class="card-img-top" alt="">
                    <div class="card-header background-cardtitle font-primary fw-bold d-flex flex-row-reverse">
                        Manejo de Usuarios
                    </div>
                    <div class="card-body background-lighter">
                        <div class="row mx-2">
                            Revise el listado de usuarios y cree nuevos usuarios.   
                        </div>
                        <div class="row d-flex flex-row-reverse">
                            <a href="{{ route('admin-users') }}" class="col-3 btn btn-secondary"> Acceder </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <img height="500" src="https://irp.cdn-website.com/3202118e/DESKTOP/png/539.png" class="card-img-top" alt="">
                    <div class="card-header background-cardtitle font-primary fw-bold d-flex flex-row-reverse">
                        Manejo de Inventario
                    </div>
                    <div class="card-body background-lighter">
                        <div class="row mx-2">
                            Revise el inventario, permite crear, editar y eliminar productos.
                        </div>
                        <div class="row d-flex flex-row-reverse">
                            <a href="{{ route('admin-inventory') }}" class="col-3 btn btn-secondary"> Acceder </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
