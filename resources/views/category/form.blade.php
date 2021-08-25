@extends('layout')
@section('title', $category->id ? 'Editar Categoria' : 'Nueva Categoria')
@section('word',  $category->id ? 'Editar Categoria' : 'Nueva Categoria')
@section('content')
<form action="{{route('category.save')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
<div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name='name' value="{{@old('name')?@old('name') : $category->name}}">
        </div>
        <label for="name" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name='description' value="{{@old('description')?@old('description') : $category->description}}">
        </div>
    </div>
    @error('name')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
    <div class="mb-3 row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
            <a href="{{ route('category.hi')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
    </div>
    </form>
@endsection
