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
                <h2 class="title text-center">Registrar nuevo producto</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ url('/admin/products') }}" method="POST">
                    @csrf
                    

                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre del producto</label>
                            <input 
                                type="text" 
                                class="form-control"
                                name="name"
                                value="{{ old('name') }}"
                            >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Precio del producto</label>
                            <input 
                                type="number" 
                                class="form-control"
                                name="price"
                                value="{{ old('price') }}"
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
                                value="{{ old('description') }}"
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
                            >{{ old('long_description') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-rounded">Registrar producto</button>
                    </div>

                    
                </form>
    
            </div>
        </div>
    </div>

</div>

@include('includes.footer')
@endsection