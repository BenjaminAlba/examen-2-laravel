@extends('auth.layout')

@section('content')
    <div class="mt-5">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <img height="500" src="https://comercializadoradane.com.mx/wp-content/uploads/2015/08/Papeleria.png" class="card-img-top" alt="">
                    <div class="card-header background-cardtitle font-primary fw-bold d-flex flex-row-reverse">
                        Inventario Global
                    </div>
                    <div class="card-body background-lighter">
                        <div class="row mx-2">
                            Revise el listado completo de productos en existencia.   
                        </div>
                        <div class="row d-flex flex-row-reverse">
                            <a href="{{ route('user-globalInventory') }}" class="col-3 btn btn-secondary"> Acceder </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <img height="500" src="https://irp.cdn-website.com/3202118e/DESKTOP/png/539.png" class="card-img-top" alt="">
                    <div class="card-header background-cardtitle font-primary fw-bold d-flex flex-row-reverse">
                        Inventario Personal
                    </div>
                    <div class="card-body background-lighter">
                        <div class="row mx-2">
                            Revise su inventario, permite crear, editar y eliminar productos.
                        </div>
                        <div class="row d-flex flex-row-reverse">
                            <a href="{{ route('user-personalInventory') }}" class="col-3 btn btn-secondary"> Acceder </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
