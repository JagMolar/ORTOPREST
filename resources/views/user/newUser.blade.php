@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         @include('includes.sidebar')
        <div class="col-md-10">
            @include('includes.message')

            <h5> Asegurar que los datos son correctos antes de su envio.</h5>
            <div class="card">
                <div class="card-header" style=" color: #386fa6;font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    {{ __('REGISTRO') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.newRegister') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="surname1" class="col-md-4 col-form-label text-md-right">{{ __('Primer Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="surname1" type="text" class="form-control{{ $errors->has('surname1') ? ' is-invalid' : '' }}" name="surname1" value="{{ old('surname1') }}" required autofocus>

                                @if ($errors->has('surname1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="surname2" class="col-md-4 col-form-label text-md-right">{{ __('Segundo Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="surname2" type="text" class="form-control{{ $errors->has('surname2') ? ' is-invalid' : '' }}" name="surname2" value="{{ old('surname2') }}" required autofocus>

                                @if ($errors->has('surname2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                            <div class="col-md-6">
                                <!--<input id="role" type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" value="{{ old('role') }}" required autofocus>-->
                                <select id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role"  required autofocus>
                                    <option value="{{ old('role') }}">Elegir una opción</option>
                                    <option value="Admin">Administrador</option>
                                    <option value="User">Usuario</option>
                                </select>

                                @if ($errors->has('role'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <input type="hidden" name="remember_token" value="{{ csrf_token() }}">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="btnSearch"  class="btn btn-primary">
                                    {{ __('Register') }}
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

