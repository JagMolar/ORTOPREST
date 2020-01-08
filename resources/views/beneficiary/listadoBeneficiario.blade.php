@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('includes.sidebar')
        <div class="col-md-9">
            @include('includes.message')
            <div class="card">
                <div class="card-header" style=" color: #386fa6;font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    LISTADO DE BENEFICIARIOS
                </div>
                <a href="{{ route('beneficiary.search')}}" id="btnSearch" class="btn btn-primary btn-md" style="padding: 0.5rem">BUSCAR BENEFICIARIO</a>
                <table class="table">
                    <tr>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>DNI</th>
                    </tr>
                    @foreach($beneficiary as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname1}}</td>
                        <td>{{$user->surname2}}</td>
                        <td>{{$user->dni}}</td>
                        
                        <td><a href="{{ route('actualizacion', $user->dni)}}" id="btnWr" class="btn btn-warning btn-sm">Actualizar</a></td>
                        <td><a href="javascript:if(confirm('¿Está seguro de borrar este registro?')){document.getElementById('delete-{{$user->dni}}').submit()}" id="btnDngr" class="btn btn-danger btn-sm">Eliminar</a>
                            <form id="delete-{{$user->dni}}" action="{{route('beneficiary.destroy',$user->dni)}}" method="POST">
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                        
                    <tr>
                    @endforeach
                </table>
            </div>
            <!-- Paginate -->
            <div class="clearfix"></div>
            <div class="paginate">
            {{$beneficiary}}
            </div>
        </div>
    </div>
</div>
@endsection
