@extends('layout')
    @section('title', 'Lista Categorias')
    @section('word', 'Listado Categorias')
    @section('content')
    <a href="{{ route('category.form')}}" class="btn btn-outline-primary">Nueva Categoria</a>
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
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $categoryList)
                <tr>
                    <td>{{$categoryList->name}}</td>
                    <td>{{$categoryList->description}}</td>
                    <td>
                        <a href="{{ route('category.form', ['id'=>$categoryList->id])}}" class="btn btn-outline-warning">Editar</a>
                        <a href="{{ route('productBrand.delete', ['id'=>$categoryList->id])}}" class="btn btn-outline-danger">Borrar</a>
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
