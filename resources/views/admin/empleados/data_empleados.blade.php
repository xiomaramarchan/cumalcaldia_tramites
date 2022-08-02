@extends('layouts.app')

@section('content')
<div class="container  lro-rs bg-cl-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-none">
                <div class="card-header monts-bold bg-cl-1">{{ __('Data de empleados') }}</div>

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
                    <form action="{{ route('empleados.importar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                            <div class="custom-file text-left">
                                <input type="file" name="file_empleados" class="custom-file-input" id="file_empleados" accept=".csv" required>
                                <label class="custom-file-label" for="file_empleados">Seleccione el archivo</label>
                            </div>
                        </div>
                        <button class="btn btn-primary">Importar data</button>
                        <a class="btn btn-success" href="{{ route('empleados.exportar') }}">Exportar data</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
