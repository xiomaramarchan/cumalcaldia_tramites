
@extends('layouts.app')
@section('content')
<div class="container  lro-rs lro-rs-ct bg-cl-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-none">
                <div class="card-header monts-bold bg-cl-1">{{ __('Constancias de Trabajo') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('ConstanciaPdf') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nómina') }}</label>

                            <div class="col-md-6">
								<div class="form-group">									
									<select class="form-control" name="nomina" id="nomina">
										@foreach($nominas as $nomina)
										<option value="{{$nomina->codigo}}">{{$nomina->descripcion}}</option>
										@endforeach
									</select>
								</div>

                                @error('nomina')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de Constacia') }}</label>

                            <div class="col-md-6">
								<div class="form-group">									
									<select class="form-control" name="tipo_const" id="tipo_const">
										
										<option value="SB">SUELDO BASE</option>
                                        <option value="SI">SUELDO INTEGRAL</option>

									</select>
								</div>
                            </div>
                        </div>
						<div class="row mb-3">
                            <label for="ceula" class="col-md-4 col-form-label text-md-end">{{ __('Cédula') }}</label>

                            <div class="col-md-6">
                                <input id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula') }}" required autocomplete="cedula" autofocus>

                                @error('cedula')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div>
						<table cellspacing="3" cellpadding="5" width="100%">
				<tr>
					<td class="text-center col-3">
						<div class="form-group">
							<a href="{{ route('ConstanciaPdf') }}" class="btn btn-primary">Generate Sample PDF</a>
						</div>
					</td>

					<td class="text-center col-3">
						<div class="form-group">
							<a href="{{ route('SavePDF') }}" class="btn btn-primary">Save Sample PDF</a>
						</div>
					</td>

					<td class="text-center col-3">
						<div class="form-group">
							<a href="{{ route('DownloadPDF') }}" class="btn btn-primary">Download Sample PDF</a>
						</div>
					</td>

					<td class="text-center col-3">
						<div class="form-group">
							<a href="{{ route('HtmlToPDF') }}" class="btn btn-primary">Html To PDF</a>
						</div>
					</td>

				</tr>
			</table>
						</div>

                        <div class="row mb-0">
                            <div class="text-end cont-1 ">
                                <button type="submit" class="btn btn-alc-2 btn-ct">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection