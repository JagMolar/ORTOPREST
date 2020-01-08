@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            
        </div>
        @include('includes.sidebar')
        <div class="col-md-9">
            @include('includes.message')

            <div class="card">
                <div class="card-header" style=" color: #386fa6;font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    GESTIÓN DE BENEFICIARIOS - ACTUALIZACIÓN DE DATOS
                    <a href="javascript:if(confirm('¿Está seguro de borrar este registro?')){document.getElementById('delete-{{$dni}}').submit()}" id="btnDngr"  class="btn btn-danger btn-sm" style="float: right !important;">Eliminar Beneficiario</a>
                            <form id="delete-{{$dni}}" action="{{route('beneficiary.destroy',$dni)}}" method="POST">
                                @method('delete')
                                @csrf
                            </form>
                </div>              

                <div class="card-body">
                    <form method="POST" action="{{route('beneficiary.BeneficiaryUpdate')}}" enctype="multipart/form-data" aria-label="Formulario Registro Usuarios - ACTUALIZACION DATOS">
                        @csrf                     
                   
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}<a style="color: red; font-weight: bold">*</a></label>
                            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="name" value="{{$name}}" required autofocus>
                                    <span></span>
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname1" class="col-md-4 col-form-label text-md-right">{{ __('Apellido 1') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="surname1" type="text" class="form-control{{ $errors->has('surname1') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;"  name="surname1" value="{{$surname1}}" required autofocus>
                                    <span></span>
                                    @if ($errors->has('surname1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname1') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname2" class="col-md-4 col-form-label text-md-right">{{ __('Apellido 2') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="surname2" type="text" class="form-control{{ $errors->has('surname2') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="surname2" value="{{$surname2}}" required autofocus>
                                    <span></span>
                                    @if ($errors->has('surname2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('surname2') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>        

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('Dni') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}" name="dni" value="{{$dni}}"  autofocus>
                                <span>El DNI debe estar formado por 8 dígitos seguido de la Letra en mayuscula sin espacios ni guiones</span>
                                    @if ($errors->has('dni'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="seg_social" class="col-md-4 col-form-label text-md-right">{{ __('Seg.Social') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="seg_social" type="text" class="form-control{{ $errors->has('seg_social') ? ' is-invalid' : '' }}"  name="seg_social" value="{{$seg_social}}" maxlength="12" required autofocus>
                                <span>El campo de número de afiliado está compuesto por 12 numeros sin espacios</span>
                                    @if ($errors->has('seg_social'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('seg_social') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prov" class="col-md-4 col-form-label text-md-right">{{ __('Provincia') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="prov" type="text" class="form-control{{ $errors->has('prov') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="prov" value="{{$prov}}" required>
                                    <span></span>
                                    @if ($errors->has('prov'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('prov') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="town" class="col-md-4 col-form-label text-md-right">{{ __('Localidad') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="town" type="text" class="form-control{{ $errors->has('town') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="town" value="{{$town}}" required>

                                    @if ($errors->has('town'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('town') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="domicile" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="domicile" type="text" class="form-control{{ $errors->has('domicile') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="domicile" value="{{$domicile}}" required autofocus>

                                    @if ($errors->has('domicile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('domicile') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num" class="col-md-4 col-form-label text-md-right">{{ __('Num') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="num" type="text" class="form-control{{ $errors->has('num') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="num" value="{{$num}}" required autofocus>

                                    @if ($errors->has('num'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('num') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="floor" class="col-md-4 col-form-label text-md-right">{{ __('Piso') }}<a style="color: red; font-weight: bold">*</a></label>
                            
                            <div class="col-md-6">
                                <!--<input id="floor" type="text" class="form-control{{ $errors->has('floor') ? ' is-invalid' : '' }}" name="floor" value="{{$floor}}" autofocus>-->
                                <select id="floor" class="form-control{{ $errors->has('floor') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="floor"  required autofocus>
                                    <option value="{{ $floor}}">{{ $floor }}</option>
                                    <option value="">Bajo</option>
                                    <option value="0">Entreplanta</option>
                                    <option value="1">1º</option>
                                    <option value="2">2º</option>
                                    <option value="3">3º</option>
                                    <option value="4">4º</option>
                                    <option value="5">5º</option>
                                    <option value="6">6º</option>
                                    <option value="7">7º</option>
                                    <option value="8">8º</option>
                                    <option value="9">9º</option>
                                    <option value="10">10º</option>
                                    <option value="11">11º</option>
                                    <option value="12">12º</option>
                                    <option value="13">13º</option>
                                    <option value="14">14º</option>
                                    <option value="15">15º</option>
                                    <option value="16">16º</option>
                                    <option value="17">17º</option>
                                    <option value="18">18º</option>
                                    <option value="19">19º</option>
                                    <option value="20">20º</option>
                                    <option value="21">21º</option>
                                    <option value="22">22º</option>
                                    <option value="23">23º</option>
                                    <option value="24">24º</option>
                                    <option value="25">25º</option>
                                    <option value="26">26º</option>
                                    <option value="27">27º</option>
                                    <option value="28">28º</option>
                                    <option value="29">29º</option>
                                    <option value="30">30º</option>                                
                                </select>
                                    @if ($errors->has('floor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('floor') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>  

                        <div class="form-group row">
                            <label for="letter" class="col-md-4 col-form-label text-md-right">{{ __('Letra') }}</label>

                            <div class="col-md-6">
                                <input id="letter" type="text" class="form-control{{ $errors->has('letter') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="letter" value="{{$letter}}" autofocus>

                                    @if ($errors->has('letter'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('letter') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cod_post" class="col-md-4 col-form-label text-md-right">{{ __('Cod. Postal') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="cod_post" type="text" class="form-control{{ $errors->has('cod_post') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="cod_post" value="{{$cod_post}}" required autofocus>

                                    @if ($errors->has('cod_post'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cod_post') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="number_tel1" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono 1') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="number_tel1" type="text" class="form-control{{ $errors->has('number_tel1') ? ' is-invalid' : '' }}" name="number_tel1" value="{{$number_tel1}}" maxlength="9" required autofocus>
                                    <span>El campo telefono debe estar formado por 9 dígitos sin espacios</span>
                                    @if ($errors->has('number_tel1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_tel1') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>                             

                        <div class="form-group row">
                            <label for="number_tel2" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono 2') }}</label>

                            <div class="col-md-6">
                                <input id="number_tel2" type="text" class="form-control{{ $errors->has('number_tel2') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="number_tel2" value="{{$number_tel2}}" maxlength="9" autofocus>

                                    @if ($errors->has('number_tel2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_tel2') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>                                                

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="email" value="{{$email}}" >

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ccc" class="col-md-4 col-form-label text-md-right">{{ __('C.C.C.') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <input id="ccc" type="text" class="form-control{{ $errors->has('ccc') ? ' is-invalid' : '' }}" name="ccc" value="{{$ccc}}" required>
                                    <span>El campo para la domiciliación bancaria debe estar compuesto por 24 dígitos, sin espacios. EL BENEFICIARIO DEBE SER TITULAR DEL MISMO.</span>
                                    @if ($errors->has('ccc'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ccc') }}</strong>
                                    </span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}<a style="color: red; font-weight: bold">*</a></label>

                            <div class="col-md-6">
                                <select id="role" class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}" name="role"  required autofocus>
                                    <option value="{{ $role }}">Su rol es: {{ $role }}. </option>
                                    <option value="Beneficiario">Beneficiario</option>
                                    <option value="Representante">Representante</option>
                                </select>
                                <span>Si la persona solicitante no es el beneficiario final, debe añadir sus datos a continuación</span>
                                @if ($errors->has('role'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="card-header">DATOS EN SU CASO, DE LA PERSONA QUE REPRESENTA AL BENEFICIARIO:</div>
                        <br>

                            <div class="form-group row">
                                <label for="name_r" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name_r" type="text" class="form-control{{ $errors->has('name_r') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="name_r" value="{{$name_r}}" autofocus>

                                        @if ($errors->has('name_r'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name_r') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname_r1" class="col-md-4 col-form-label text-md-right">{{ __('Apellido 1') }}</label>

                                <div class="col-md-6">
                                    <input id="surname1_r" type="text" class="form-control{{ $errors->has('surname1_r') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="surname1_r" value="{{$surname1_r}}"  autofocus>

                                        @if ($errors->has('surname1_r'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('surname1_r') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname2_r" class="col-md-4 col-form-label text-md-right">{{ __('Apellido 2') }}</label>

                                <div class="col-md-6">
                                    <input id="surname2_r" type="text" class="form-control{{ $errors->has('surname2_r') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="surname2_r" value="{{$surname2_r}}" autofocus>

                                        @if ($errors->has('surname2_r'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('surname2_r') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="doc" class="col-md-4 col-form-label text-md-right">{{ __('Dni') }}</label>

                                <div class="col-md-6">
                                    <input id="doc" type="text" class="form-control{{ $errors->has('doc') ? ' is-invalid' : '' }}" style="margin-bottom: 20px;" name="doc" value="{{$doc}}"  autofocus>

                                        @if ($errors->has('doc'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('doc') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="related_r" class="col-md-4 col-form-label text-md-right">{{ __('Relación con el beneficiario') }}</label>

                                <div class="col-md-6">
                                    <input id="related_r" type="text" class="form-control{{ $errors->has('related_r') ? ' is-invalid' : '' }}" name="related_r" value="{{$related_r}}"  autofocus>

                                        @if ($errors->has('related_r'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('related_r') }}</strong>
                                        </span>
                                        @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="btnSearch"  class="btn btn-primary">
                                        Actualizar datos Beneficiario
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


