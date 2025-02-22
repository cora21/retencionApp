@extends('layouts.empreApp') <!-- Nombre del archivo de la plantilla -->

@section('titulo', 'Usuario')

@section('contenido')
    <main class="m-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Perfil</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Configuración</button>
            </li>
          </ul>
          {{-- da inicio a la nav para navegar por los datos de los usuarios --}}
          <div class="tab-content" id="myTabContent">
            {{-- nav que contiene formulario de datos de la empresa --}}
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                <div class="card">
                    <div class="card-body">
                        <h3>Configuración del perfil</h3>
                
                        <!-- Notificación si el perfil está incompleto -->
                        @if ($perfilIncompleto)
                            <div class="alert alert-warning" role="alert">
                                <strong>¡Atención!</strong> No has completado tu perfil. Por favor, llena todos los campos obligatorios.
                            </div>
                        @endif
                
                        <!-- Formulario de perfil de la empresa -->
                        <form action="{{ route('perfilEmpresa.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                
                            <!-- Campo: Nombre Comercial -->
                            <div class="form-group">
                                <label for="nombre_comercial">Nombre Comercial:</label>
                                <input type="text" name="nombre_comercial" class="form-control w-50" 
                                       value="{{ auth()->user()->empresa ? auth()->user()->empresa->nombre_comercial : '' }}" required>
                            </div>
                
                            <!-- Campo: Dirección -->
                            <div class="form-group">
                                <label for="direccionEmpresa">Dirección:</label>
                                <input type="text" name="direccionEmpresa" class="form-control w-50" 
                                       value="{{ auth()->user()->empresa ? auth()->user()->empresa->direccionEmpresa : '' }}" required>
                            </div>
                
                            <!-- Campo: Teléfono -->
                            <div class="form-group">
                                <label for="telefonoEmpresa">Teléfono:</label>
                                <input type="text" name="telefonoEmpresa" class="form-control w-50" 
                                       value="{{ auth()->user()->empresa ? auth()->user()->empresa->telefonoEmpresa : '' }}" required>
                            </div>
                
                            <!-- Campo: Descripción -->
                            <div class="form-group">
                                <label for="descripcionEmpresa">Descripción:</label>
                                <textarea name="descripcionEmpresa" class="form-control w-50">
                                    {{ auth()->user()->empresa ? auth()->user()->empresa->descripcionEmpresa : '' }}
                                </textarea>
                            </div>
                
                            <!-- Campo: RIF/Cédula -->
                            <div class="form-group">
                                <label for="rif_cedulaEmpresa">RIF/Cédula:</label>
                                <input type="text" name="rif_cedulaEmpresa" class="form-control w-50" 
                                       value="{{ auth()->user()->empresa ? auth()->user()->empresa->rif_cedulaEmpresa : '' }}" required>
                            </div>
                
                            <!-- Campo: Correo Electrónico -->
                            <div class="form-group">
                                <label for="correoEmpresa">Correo Electrónico:</label>
                                <input type="email" name="correoEmpresa" class="form-control w-50" 
                                       value="{{ auth()->user()->empresa ? auth()->user()->empresa->correoEmpresa : '' }}" required>
                            </div>
                            <br>
                            <!-- Botón de guardar -->
                            <button type="submit" class="btn btn-primary">Guardar Perfil</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- fin de nav datos de la empresa --}}

            {{-- nav de claves y usuario de la empresa --}}
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <br>
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <h2>Configuración del inicio de sesión</h2>
                            <input type="email" name="email" class="form-control" value="{{ auth()->user()->id }}">
                            <form action="{{ route('perfilEmpresa.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nombre:</label>
                                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo electrónico:</label>
                                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Nueva Contraseña:</label>
                                    <input type="password" name="password" class="form-control" placeholder="dejar en blanco para no cambiar">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- nav fin de claves y datos de la empresa --}}
          </div>


    </main>




















@endsection