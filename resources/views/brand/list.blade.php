@extends('layout')
    @section('title', 'Lista Marcas')
    @section('word', 'Listado Marcas')
    @section('content')
    <a href="{{ route('brand.form')}}" class="btn btn-outline-primary">Nuevo Marca</a>
    <a href="{{ route('welcome.hi')}}" class="btn btn-outline-secondary">Volver</a>
    @if(Session::has('message'))
    <script>
        swal("","{{ Session::get('message') }}", "error");
    </script>
@endif

@if(Session::has('succesMessage'))
    <script>
        swal("Correcto", "{{ Session::get('succesMessage') }}", "success");
    </script>
@endif

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Brand</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $brandlist)
                <tr>
                    <td>{{$brandlist->name}}</td>
                    <td>
                        <a href="{{ route('brand.form', ['id'=>$brandlist->id])}}" class="btn btn-outline-warning">Editar</a>
                        <a href="{{ route('productBrand.delete', ['id'=>$brandlist->id])}}" class="btn btn-outline-danger">Borrar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection

    @push('name')

    @endpush

    @prepend('name')

    @endprepend
