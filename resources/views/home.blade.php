@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 50px">
        <div class="col-md-6">
            @include('includes.message')
            <div class="card pt-6 shadow rounded">
                <div class="card-header" style="color: #386fa6;font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    Bienvenido,  {{ Auth::user()->name }}!
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Has iniciado sesión!
                 
                    <div>
                        <br>
                        <span><strong style="color: #386fa6;">RECUERDE QUE POR SEGURIDAD, SÓLO LOS ADMINISTRADORES PUEDEN:</strong>
                        <ul>
                            <li style="list-style-type: none">Crear Usuarios</li>
                            <li style="list-style-type: none">Modificar datos de Usuarios</li>
                            <li style="list-style-type: none">Eliminar Usuarios</li>
                            <li style="list-style-type: none">Crear productos</li>
                            <li style="list-style-type: none">Modificar productos</li>
                            <li style="list-style-type: none">Eliminar productos</li>
                        </ul>
                        <strong style="color: #386fa6;"> EN CASO DE NECESITAR HACER ALGUNA OPERACIÓN EN ESOS REGISTROS, DEBE SOLICITARLO A UN ADMINISTRADOR.</strong>
                    </span>
                        
                    </div>
                    
                    
                    <br>
                    <div class="clearfix"></div>
                  
                    <h6 style=" text-align: center; background:#227dc7; color: #ffffff">ENLACES HABITUALES</h6>
                    <br>
                        <div class="searching">
                            <a style="text-align: center !important" href="{{ route('searchGoogle')}}" target="blank" itemid="google"><img src="../resources//assets/images/nuevo-logo-de-google1.jpg" alt="" /></a>
                            <a style="text-align: center !important"   href="{{ route('searchSacyl')}}" target="blank" itemid="google"><img src="../resources//assets/images/logo-vector-sacyl.jpg" alt="" /></a>
                            <a style="text-align: center !important"  href="{{ route('searchHospLeon')}}" target="blank" itemid="google"><img src="../resources//assets/images/logo-hospital-leon.jpg" alt="" /></a>
                            <a style="text-align: center !important"  href="{{ route('searchJcyl')}}" target="blank" itemid="google"><img src="../resources//assets/images/logo-vector-junta-castilla-y-leon.jpg" alt="" /></a>
                            <a style="text-align: center !important"  href="{{ route('user.helpguide')}}" target="blank" itemid="google"><img src="../resources//assets/images/logo-help.jpg" alt="" /></a>
<!--                        <a id="btnSearch" href="{{ route('searchGoogle')}}" class="btn btn-primary btn-md" target="blank" itemid="google" >Buscador de Google</a>
                        <a id="btnSearch" href="{{ route('searchSacyl')}}" class="btn btn-primary btn-md" target="blank" itemid="sacyl">Sacyl</a>
                        <a id="btnSearch" href="{{ route('searchHospLeon')}}" class="btn btn-primary btn-md"  itemid="hospital_leon" target="blank">Hospital de León</a>
                        <a id="btnSearch" href="{{ route('searchJcyl')}}" class="btn btn-primary btn-md" target="blank" itemid="jcyl" >JCyL</a>-->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
