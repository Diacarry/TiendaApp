@extends('layouts.blank')
@section('title')
    Productos
@endsection
@section('content')
    <div class="flex-center position-ref full-height"><br>
        @if (Route::has('login'))
            <div class="text-right">
                @auth
                    <a href="{{ url('/') }}" class="btn btn-outline-danger">Menu</a>
                    <a href="{{ url('/home') }}" class="btn btn-outline-secondary">Cuenta</a>
                @endauth
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h2>PRODUCTOS</h2>
            </div>
            <div class="card-body">
            <p><a href="{{ route('productos.create') }}" class="btn btn-success">Registrar un producto</a></p>
                <div class="card">
                    <div class="card-header">
                        Listado de Productos
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Talla</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Observaciones</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Fecha Embarque</th>
                                    <th scope="col">Editar</th>
                                    <th scope="col">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $info)
                                    <tr>
                                        <th>{{ $info->id }}</th>
                                        <td>{{ $info->name }}</td>
                                        <td>{{ $info->size }}</td>
                                        <td>{{ $info->fk_brand }}</td>
                                        <td>{{ $info->observations }}</td>
                                        <td>{{ $info->quantity }}</td>
                                        <td>{{ $info->shipping_date }}</td>
                                        <td><a href="/productos/{{ $info->id }}/edit" class="btn btn-warning"></a></td>
                                        <td>
                                            <form action="/productos/{{ $info->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <div class="alert alert-danger" role="alert">
                                            No hay pripietarios registrados
                                        </div>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $data->links() }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection