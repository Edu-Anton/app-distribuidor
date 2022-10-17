<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
</html> -->

@extends('layouts.app')

@section('title', 'App Shop | Dashboard')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised" style="padding-bottom: 3rem">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div>
                <h2 class="title text-center">Dashboard</h2>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                
                <ul class="nav nav-pills nav-pills-primary" role="tablist">
                    <li class="active">
                        <a href="#dashboard" role="tab" data-toggle="tab">
                            <i class="material-icons">dashboard</i>
                            Carrito de Compras
                        </a>
                    </li>
                    
                    <li>
                        <a href="#tasks" role="tab" data-toggle="tab">
                            <i class="material-icons">list</i>
                            Pedidos realizados
                        </a>
                    </li>
                </ul>

                <hr/>
                <p>Tu carrito de compras presenta {{ auth()->user()->cart->details->count() }} productos.</p>

                @foreach (auth()->user()->cart->details as $detail)
                    <ul>
                        <li>{{ $detail }}</li>
                    </ul>
                @endforeach



                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center col-md-1">#</th>
                            <th class="col-md-3">Nombre</th>
                            <th class="text-right col-md-2">Precio</th>
                            <th class="text-right col-md-2">Cantidad</th>
                            <th class="text-right col-md-2">Sub-total</th>
                            <th class="text-right col-md-2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (auth()->user()->cart->details as $detail)
                        <tr>
                            <td class="text-center">
                                <img src="{{ $detail->product->featured_image_url }}" alt="" width="50px">
                            </td>
                            <td class="text-left">
                                <a href="{{ url('/products/'.$detail->product->id) }}" style="line-height:50px" target="_blank">{{ $detail->product->name }}</a>
                            </td>
                            <td class="text-right">
                                <span style="line-height: 50px">$ {{ $detail->product->price }}</span>
                            </td>
                            <td class="text-right">
                                <span style="line-height: 50px">{{ $detail->quantity }}</span>
                            </td>
                            <td class="text-right">
                                <span style="line-height: 50px">$ {{ $detail->quantity * $detail->product->price }}</span>
                            </td>
                            <td class="td-actions text-right">
                                <a href="{{ url('/products/'.$detail->product->id) }}" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                    <i class="fa fa-info"></i>
                                </a>
                                <form action="{{ url('/cart') }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                                    <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>




            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection