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
                        <div class="row">
                            <h3>Formato del archivo admitido:</h3>
                            <div class="row">
                                <div class="col-6">
                                    <ul>
                                        <li>asd</li>
                                        <li>asdas</li>
                                        <li>asdasd</li>
                                        <li>asd</li>
                                        <li>asdas</li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul>
                                        <li>asd</li>
                                        <li>asdas</li>
                                        <li>asdasd</li>
                                        <li>asd</li>
                                        <li>asdas</li>
                                    </ul>
                                </div>
                            </div>
                           
                            <div class="form-group mb-4 col-6" style="max-width: 500px; margin: 0 auto;">
                                <div class="custom-file ">
                                    <input type="file" name="file_empleados" class="custom-file-input d-none" id="file_empleados" accept=".csv" required>
                                    <label class="custom-file-label inp-file-1" for="file_empleados">Seleccione el archivo</label>
                                </div>
                            </div>
                            <div class="text-end col-6">
                            <button class="btn btn-primary ">Importar data</button>
                            <a class="btn btn-success" href="{{ route('empleados.exportar') }}">Exportar data</a>
                            </div>
  
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
