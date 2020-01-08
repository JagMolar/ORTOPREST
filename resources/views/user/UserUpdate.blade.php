@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 50px">
      
        <div class="col-md-5">
            @include('includes.message')
            
            <div class="card pt-6 shadow rounded">
                <div class="card-header" style=" color: #386fa6;font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    Actualización Datos de Usuario
                    <a href="javascript:if(confirm('¿Está seguro de borrar este registro?')){document.getElementById('delete-{{$id}}').submit()}" id="btnDngr" class="btn btn-danger btn-sm">Eliminar</a>
                            <form id="delete-{{$id}}" action="{{route('user.destroy',$id)}}" method="POST">
                                @method('delete')
                                @csrf
                            </form>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.UpdateUser') }}" aria-label="Actualización Perfil Usuario">
                        @csrf
                        
                       <input id="id" type="text" class="" name="id" value="{{ $id }}"  hidden /> 
                         

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="surname1" class="col-md-4 col-form-label text-md-right">{{ __('Apellido 1') }}</label>

                            <div class="col-md-6">
                                <input id="surname1" type="text" class="form-control{{ $errors->has('surname1') ? ' is-invalid' : '' }}" name="surname1" value="{{ $surname1 }}" required autofocus>

                                @if ($errors->has('surname1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="surname2" class="col-md-4 col-form-label text-md-right">{{ __('Apellido  2') }}</label>

                            <div class="col-md-6">
                                <input id="surname2" type="text" class="form-control{{ $errors->has('surname2') ? ' is-invalid' : '' }}" name="surname2" value="{{ $surname2 }}" required autofocus>

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
                                <!--<input id="role" type="text" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role" value="{{  Auth::user()->role }}" required autofocus>-->
                                <select id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role"  required autofocus>
                                    <option value="{{ $role }}">Su rol es: {{ $role }}.</option>
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
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="btnSearch"  class="btn btn-primary">
                                    Actualizar datos
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
