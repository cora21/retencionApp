@extends('layouts.app') <!-- Nombre del archivo de la plantilla -->

@section('titulo', 'Gestión de los usuarios')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@section('contenido')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('gestion.store') }}" method="POST">
                            @csrf
    
                            <!-- Nombre -->
                            <div class="mb-3">
                                {{-- <label for="name" class="form-label">Nombre:</label> --}}
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>
    
                            <!-- Email -->
                            <div class="mb-3">
                                {{-- <label for="email" class="form-label">Email:</label> --}}
                                <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electronico" required>
                            </div>
    
                            <!-- Contraseña -->
                            <div class="mb-3">
                                {{-- <label for="password" class="form-label">Contraseña:</label> --}}
                                <input type="password" name="password" id="password" placeholder="Contraseña" class="form-control" required>
                            </div>

                            <!-- Confirmar Contraseña -->
                        <div class="mb-3">
                            {{-- <label for="password_confirmation" class="form-label">Confirmar Contraseña:</label> --}}
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar contraseña" class="form-control" required>
                        </div>
    
                            <!-- Rol -->
                            <div class="mb-3">
                                {{-- <label for="role" class="form-label">Rol:</label> --}}
                                <select name="role" id="role" class="form-select" required>
                                    <option value="">Selecciona un rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <!-- Botón de envío -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Crear Usuario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



        


















<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
@endsection
