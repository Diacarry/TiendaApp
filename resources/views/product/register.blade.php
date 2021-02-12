@extends('layouts.blank')
@section('title')
    Registro Producto
@endsection
@section('content')
    <br>
    @if (Route::has('login'))
        <div class="text-right">
            @auth
                <a href="{{ route('productos.index') }}" class="btn btn-outline-danger">Atras</a>
                <a href="{{ url('/home') }}" class="btn btn-outline-secondary">Cuenta</a>
            @endauth
        </div>
    @endif
    <h2>Registrar un nuevo producto</h2>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/productos" method="POST">
        @csrf
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Diego" value="{{ old('nombre') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="size" class="col-sm-2 col-form-label">Talla</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="size" name="size" placeholder="S, L ò M" value="{{ old('size') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="fk_brand" class="col-sm-2 col-form-label">Marca</label>
            <div class="col-sm-10">
                <select name="fk_brand" id="fk_brand" class="form-control">
                    <option value="">Seleccione una marca</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->id }} {{ $marca->name }}</option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="observations" class="col-sm-2 col-form-label">Observaciones</label>
            <div class="col-sm-10">
                <textarea name="observations" id="observations" cols="50" rows="2" placeholder="Informacion">{{ old('observations') }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Cantidad</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="123" value="{{ old('quantity') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="shipping_date" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="shipping_date" name="shipping_date" placeholder="Mosquera" value="{{ old('shipping_date') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
@endsection