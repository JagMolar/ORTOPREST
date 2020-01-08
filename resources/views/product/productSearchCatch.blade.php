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
                    Listado de Productos Encontrados</div>
                <table class="table">
                    <tr>
                        <th>Código</th>
                        <th>descripción</th>
                        <th>Financiación</th>
                        <th>Duración</th>
                        <th>Centro</th>
                        <th>Comentarios</th>
                        <th>Stock</th>
                    </tr>
                    @foreach($productSearchFind as $prod)
                    <tr>
                        <td>{{$prod->cod}}</td>
                        <td>{{$prod->description}}</td>
                        <td>{{$prod->funding}}</td>
                        <td>{{$prod->lapse}}</td>
                        <td>{{$prod->center}}</td>
                        <td>{{$prod->comments}}</td>
                        <td>{{$prod->stock}}</td>
 
                        <td><a href="{{ route('product.ProductUpdate', $prod->id)}}" id="btnWr"  class="btn btn-warning btn-sm">Actualizar</a></td>
                        <td><a href="javascript:if(confirm('¿Está seguro de borrar este registro?')){document.getElementById('delete-{{$prod->id}}').submit()}" id="btnDngr"  class="btn btn-danger btn-sm">Eliminar</a>
                            <!--<a href="javascript:document.getElementById('delete-{{$prod->id}}').submit()" id="btnDngr"  class="btn btn-danger btn-sm">Eliminar</a>-->
                            <form id="delete-{{$prod->id}}" action="{{route('product.destroy',$prod->id)}}" method="POST">
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                        <td><a href="{{route('product.searchAssignment', $prod->id)}}" id="btnPrst"  class="btn btn-success btn-sm">Préstamo</a></td>
                    <tr>
                    @endforeach
                </table>
            </div>
            <!-- Paginate -->
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center pt-2">
                    {{ $productSearchFind->appends(['description' => $description]) }}
<!--                    $locales->appends(['searchText' => $searchText])->links();-->
                </div>
            </div>           
        </div>
    </div>
</div>
@endsection
