@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="padding-top: 50px">
        @include('includes.sidebar')
        <div class="col-md-9">
            @include('includes.message')
            <div class="card-body">

                <h5> Busque a continuación con una breve descripción.</h5>
            <div class="card pt-6 shadow rounded">
                <div class="card-header" style="color: #386fa6;font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    GESTIÓN DE PRODUCTOS - ACTUALIZACIÓN DE DATOS
                </div>  
                    <form method="GET" action="{{route('product.productSearchCatch')}}" enctype="multipart/form-data" class="form-inline mt-2 mt-md-0">
<!--                        @method('put')-->
                        @csrf
                        <input class="form-control ml-4 mr-md-4" type="text" id="description" name="description"  placeholder="Silla de ruedas" aria-label="Buscar">
                        <button class="btn btn-sm mt-4 my-2 my-md-4" id="btnPrst"  type="submit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Buscar producto</font></font></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

