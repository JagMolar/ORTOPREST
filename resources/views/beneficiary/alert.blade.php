@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include('includes.sidebar')
        <div class="col-md-9">
            @include('includes.message')
            <div class="card">
                <div class="card-header" style="color: red !important; font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    BENEFICIARIOS CON PRÉSTAMOS VENCIDOS
                </div>
                <table class="table" style="">
                    <tr style="">
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>Dni</th>
                        <th>ID Producto</th>
                        <th style="color: red !important;">Fecha final de préstamo</th>
                    </tr>
                    @foreach($alertEnd as $dateF)
                    <tr>
                        <td>{{$dateF->name}}</td>
                        <td>{{$dateF->surname1}}</td>
                        <td>{{$dateF->surname2}}</td>
                        <td>{{$dateF->dni}}</td>
                        <!--<td><a href="{{route('product.viewProduct', $dateF->dni)}}" id="btnProd" class="btn btn-primary btn-sm">{{$dateF->dni}}</a></td>-->
                        <td><a href="{{route('product.viewProduct', $dateF->product_id)}}" id="btnProd" class="btn btn-primary btn-sm">{{$dateF->product_id}}</a></td>
                        <td style="color: red !important;">{{$dateF->final_lapse}}</td>
                        
                        <td><a href="javascript:if(confirm('¿Está seguro de borrar este registro?')){document.getElementById('{{$dateF->dni}}').submit()}" id="btnWr" class="btn btn-warning btn-sm">Devolución/Anulación préstamo</a>
                            <form id="{{$dateF->dni}}" action="{{route('product.prestamoDeleted', $dateF->dni)}}" method="GET">
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                        
                        <!--<td><a href="{{route('product.prestamoDeleted', $dateF->dni)}}" id="btnWr"  class="btn btn-warning btn-sm">Devolución/Anulación préstamo</a></td>-->
                        <!--<td><a href="{{route('product.prestamoDeleted', $dateF->product_id)}}" id="btnWr"  class="btn btn-warning btn-sm">Devolución/Anulación préstamo</a></td>-->
                    <tr>
                    @endforeach
                </table>
                <div class="card-header" style=" color: #386fa6;font-weight: bold; text-align: center !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    BENEFICIARIOS CON PRÉSTAMOS ACTIVOS
                </div>
                <table class="table">
                    <tr>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>Dni</th>
                        <th>ID Producto</th>
                        <th>Fecha inicio de préstamo</th>
                        <th>Fecha final de préstamo</th>
                    </tr>
                    @foreach($datefunding as $date)
                    <tr>
                        <td>{{$date->name}}</td>
                        <td>{{$date->surname1}}</td>
                        <td>{{$date->surname2}}</td>
                        <td>{{$date->dni}}</td>
                        <td><a href="{{route('product.viewProduct', $date->product_id)}}" id="btnProd" class="btn btn-primary btn-sm">{{$date->product_id}}</a></td>
                        <!--<td><a href="{{route('product.viewProduct', $date->dni)}}" id="btnProd" class="btn btn-primary btn-sm">{{$date->dni}}</a></td>-->
                        <td>{{$date->init_lapse}}</td>
                        <td>{{$date->final_lapse}}</td>                       
                        
                        <td><a href="javascript:if(confirm('¿Está seguro de borrar este registro?')){document.getElementById('{{$date->dni}}').submit()}" id="btnWr" class="btn btn-warning btn-sm">Devolución/Anulación préstamo</a>
                            <form id="{{$date->dni}}" action="{{route('product.prestamoDeleted', $date->dni)}}" method="GET">
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                        
                        
                        
                       <!--<td><a href="{{route('product.prestamoDeleted', $date->dni)}}" id="btnWr"  class="btn btn-warning btn-sm">Devolución/Anulación préstamo</a></td>-->
                           <!--<td><a href="{{route('product.prestamoDeleted', $date->product_id)}}" id="btnWr"  class="btn btn-warning btn-sm">Devolución/Anulación préstamo</a></td>-->
                    <tr>
                    @endforeach
                </table>
            </div>
            <!-- Paginate -->
            <div class="clearfix"></div>
            <div class="paginate">
            {{$datefunding}}
            </div>
        </div>
    </div>
</div>
@endsection
