<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
</html> -->

@extends('layouts.app')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
</div>

<div class="main main-raised">
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div>
                <h2 class="title text-center">Editar producto seleccionado</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/admin/products/'.$product->id.'/edit') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input 
                                type="text" 
                                class="form-control"
                                name="name"
                                value="{{ old('name', $product->name) }}"
                            >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio del producto</label>
                            <input 
                                type="number"
                                step="0.01" 
                                class="form-control"
                                name="price"
                                value="{{ old('price', $product->price) }}"
                            >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción corta</label>
                            <input 
                                type="text" 
                                class="form-control"
                                name="description"
                                value="{{ old('description', $product->description) }}"
                            >
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">Descripción larga del producto</label>
                            <textarea
                                class="form-control" 
                                rows="5" 
                                name="long_description"
                            >{{ old('long_description', $product->long_description) }}</textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-rounded">Guardar cambios</button>
                        <a href="{{ url('/admin/products') }}" class="btn btn-default btn-rounded">Cancelar</a>
                    </div>

                    
                </form>
    
            </div>
        </div>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Blog
                    </a>
                </li>
                <li>
                    <a href="http://www.creative-tim.com/license">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
        </div>
    </div>
</footer>
@endsection