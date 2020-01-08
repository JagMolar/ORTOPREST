@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 50px">
        @include('includes.sidebar')
        <div class="col-md-9">
            @include('includes.message')
            <div class="card-body">

                <h5> Busque a continuación por el DNI del Beneficiario.</h5>
                <div class="card pt-6 shadow rounded">
                    <div class="card-header" style="color: #386fa6;font-weight: bold; text-align: center !important">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                        GESTIÓN DE PRODUCTOS - ASIGNACIÓN PARA PRÉSTAMO
                    </div>  
                    <form method="GET" action="{{route('product.productLending', $product->id)}}" enctype="multipart/form-data" class="form-inline mt-2 mt-md-0">
                        <!--@method('put')-->
                        @csrf
                        <input class="form-control ml-4 mr-md-4" type="text" id="dni" name="dni"  placeholder="12345678A" aria-label="Buscar">
                        <button class="btn btn-sm mt-4 my-2 my-md-4" id="btnPrst"  type="submit"><font style="vertical-align: inherit;">Solicitar</font></button>
                    </form>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection


