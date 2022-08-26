@extends('layouts.app')

@section('content')
<div class="container  lro-rs bg-cl-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-none">
                <div class="card-header monts-bold bg-cl-1">{{ __('Usuarios registrados') }}</div>
                    <div class="card-body">
                        <!-- Success message -->
                        @if(Session::has('error'))
                            <div class="alert alert-error">
                                {{ Session::get('error') }}
                            </div>
                        @elseif(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>                        
                        @endif
                        <a href="{{ route('users.create')}}" class="btn btn-success" role="button"><i class="fas fa-plus-circle"></i>&nbsp;<span>Usuario</span></a>                        
                        <div class="container table-responsive-sm">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                      <th scope="col">Nombre</th>
                                      <th scope="col">Correo</th>
                                      <th scope="col">Acciones</th>                                  
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($usuarios as $usuario)
                                    <tr>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>                                
                                            <td>
                                                <a href="{{ url("/usuarios/ver/{$usuario->id}") }}"><span><i class="fas fa-eye"></i></span></a>&nbsp;
                                                <a href="{{ url("/usuarios/editar/{$usuario->id}") }}"><span><i class="fas fa-pencil-alt"></i></span></a>&nbsp;
                                                <a href="{{ url("/usuarios/eliminar/{$usuario->id}") }}"><span><i class="fas fa-trash-alt"></i></span></a>
                                            </td>
                                    </tr>
                                    @endforeach
                                  </tbody>                            
                            </table>

                        </div>
            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
