@extends('layouts.app') <!-- Nombre del archivo de la plantilla -->

@section('titulo', 'Gestión de Usuario')

@section('contenido')
    <p>Bienvenido a la gestion de usuario.</p>
    <section class="py-5 m-5">
        <div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($usu as $item)
                <tr>
                    <th>{{$item->id}}</th>
                    <th scope="row">{{$item->name}}</th>
                    <td>{{$item->email}}</td>
                    <td>{{$item->password}}</td>
                    <td>
                        botones
                    </td>
                </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </section>

@endsection
