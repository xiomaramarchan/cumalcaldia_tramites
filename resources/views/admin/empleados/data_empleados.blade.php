@extends('layouts.app')

@section('content')
<div class="container  lro-rs bg-cl-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-none">
                <div class="card-header monts-bold bg-cl-1">{{ __('Data de empleados') }}</div>

                <div class="card-body">
                    <form action="{{ route('empleados.importar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                            <div class="custom-file text-left">
                                <input type="file" name="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Seleccione el archivo</label>
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
