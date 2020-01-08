@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         @include('includes.sidebar')
        <div class="col-md-9">
            @include('includes.message')

            <h5> Asegurar que los datos son correctos antes de su envio.</h5>
            <div class="card">

                <div class="card-header" style=" color: #386fa6;font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    GESTIÓN DE PRODUCTOS - REGISTRO
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registro.save')}}" enctype="multipart/form-data" aria-label="Formulario Registro Productos - REGISTRO">
                        @csrf

                        <div class="form-group row">
                            <label for="cod" class="col-md-4 col-form-label text-md-right">{{ __('Código') }}</label>

                            <div class="col-md-6">
                                <input id="cod" type="text" class="form-control{{ $errors->has('cod') ? ' is-invalid' : '' }}" name="cod" value="{{ old('cod') }}" maxlength="8" required autofocus>

                                    @if ($errors->has('cod'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cod') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <!--<input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>-->
                                <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" rows="3" name="description" value="{{ old('description') }}" required autofocus></textarea>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="funding" class="col-md-4 col-form-label text-md-right">{{ __('Financiación') }}</label>

                            <div class="col-md-6">
                                <input id="funding" type="text" class="form-control{{ $errors->has('funding') ? ' is-invalid' : '' }}" name="funding" value="{{ old('funding') }}" autofocus>

                                    @if ($errors->has('funding'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('funding') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="lapse" class="col-md-4 col-form-label text-md-right">{{ __('Periodo préstamo') }}</label>

                            <div class="col-md-6">
                                <!--<input id="lapse" type="text" class="form-control{{ $errors->has('lapse') ? ' is-invalid' : '' }}" name="lapse" value="{{ old('lapse') }}" autofocus>-->
                                <select id="lapse" class="form-control{{ $errors->has('lapse') ? ' is-invalid' : '' }}" name="lapse"  required autofocus>
                                    <option value="{{ old('lapse') }}">Elegir una opción</option>
                                    <!--<option value="0">1 TEST</option>-->
                                    <option value="1">1 MES</option>
                                    <option value="6">6 MESES</option>
                                    <option value="12">12 MESES</option>
                                    <option value="18">18 MESES</option>
                                    <option value="24">24 MESES</option>
                                    <option value="36">36 MESES</option>
                                </select>

                                    @if ($errors->has('letter'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lapse') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="center" class="col-md-4 col-form-label text-md-right">{{ __('Centro') }}</label>

                            <div class="col-md-6">
                                <select id="center" class="form-control{{ $errors->has('center') ? ' is-invalid' : '' }}" name="center"  required autofocus>
                                    <option value="{{ old('center') }}">Elegir una opción</option>
                                    <option value="Hospital de León">Hospital de León</option>
                                    <option value="Hospital Monte San Isisdro">Hospital Monte San Isidro</option>
                                    <option value="Condesa">Condesa</option>
                                    <option value="Armunia">Armunia</option>
                                    <option value="Crucero">Crucero</option>
                                    <option value="Palomera">Palomera</option>
                                    <option value="Eras de Renueva">Eras de Renueva</option>
                                    <option value="Jose Aguado I y II">Jose Aguado I y II</option>
                                </select>

                                    @if ($errors->has('center'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('center') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">{{ __('Comentarios') }}</label>

                            <div class="col-md-6">
                                <!--<input id="comments" type="text" class="form-control{{ $errors->has('comments') ? ' is-invalid' : '' }}" name="comments" value="{{ old('comments') }}" required autofocus>-->
                                <textarea id="comments" class="form-control{{ $errors->has('comments') ? ' is-invalid' : '' }}" rows="2" name="comments" value="{{ old('comments') }}" required autofocus></textarea>
                                    @if ($errors->has('comments'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="text" class="form-control{{ $errors->has('stock') ? ' is-invalid' : '' }}" name="stock" value="{{ old('stock') }}" required autofocus>

                                    @if ($errors->has('stock'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('stock') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>                                                
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="btnSearch"  class="btn btn-primary">
                                        Guardar
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

