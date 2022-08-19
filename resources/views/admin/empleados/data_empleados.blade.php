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
                                    <input type="file" name="file_empleados"  id="file_empleados"  class="inputfile " data-multiple-caption="{count} archivos seleccionados" multiple  required />
                                    <label for="file_empleados" class="custom-file-label inp-file-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                                        <span>Seleccionar archivo</span>
                                    </label>
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
