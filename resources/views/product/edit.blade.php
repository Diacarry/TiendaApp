@extends('layouts.blank')
@section('title')
    Editar Producto
@endsection
@section('content')
    <br>
    @if (Route::has('login'))
        <div class="text-right">
            @auth
                <a href="{{ route('vechicles.index') }}" class="btn btn-outline-danger">Atras</a>
                <a href="{{ url('/home') }}" class="btn btn-outline-secondary">Cuenta</a>
            @endauth
        </div>
    @endif
    <h2>Editar datos de un producto</h2>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/productos/{{ $data->id }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <h3>{{ $data->id }}</h3>
            </div>
        </div>
        <div class="form-group row">
            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ $data->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="size" class="col-sm-2 col-form-label">Talla</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="size" name="size" placeholder="Talla" value="{{ $data->size }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="fk_brand" class="col-sm-2 col-form-label">Marca ({{ $data->fk_brand }})</label>
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
                <textarea name="observations" id="observations" cols="50" rows="2" placeholder="informacion">{{ $data->observations }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="quantity" class="col-sm-2 col-form-label">Cantidad</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="123" value="{{ $data->quantity }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="shipping_date" class="col-sm-2 col-form-label">Fecha</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="shipping_date" name="shipping_date" placeholder="12/02/2021" value="{{ $data->shipping_date }}">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Modificar</button>
    </form>
@endsection