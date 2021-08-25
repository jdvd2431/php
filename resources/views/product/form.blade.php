@extends('layout')
@section('title', $product->id ? 'Editar Producto' : 'Nuevo Producto')
@section('word',  $product->id ? 'Editar Producto' : 'Nuevo Producto')
@section('content')
<form action="{{route('product.save')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$product->id}}">
<div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name='name' value="{{@old('name')?@old('name') : $product->name}}">
        </div>
    </div>
    @error('name')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
    <div class="mb-3 row">
        <label for="cost" class="col-sm-2 col-form-label">Cost</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="cost" name='cost' value="{{@old('cost')?@old('cost') : $product->cost}}">
        </div>
    </div>
    @error('cost')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">price</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name='price' value="{{@old('price')?@old('price') : $product->price}}">
        </div>
    </div>
    @error('price')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
    <div class="mb-3 row">
        <label for="quantity" class="col-sm-2 col-form-label">quantity</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="quantity" name='quantity' value="{{@old('quantity')?@old('quantity') : $product->quantity}}">
        </div>
    </div>
    @error('quantity')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
    <div class="mb-3 row">
        <label for="brand" class="col-sm-2 col-form-label">brand</label>
        <div class="col-sm-10">
            <select name="brand" class="form-select" id="brand">
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? "selected" : "" }}>
                    {{ $brand->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="brand" class="col-sm-2 col-form-label">category</label>
        <div class="col-sm-10">
            <select name="category" class="form-select" id="category">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? "selected" : "" }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    @error('brand')
        <p class="text-danger">
            {{ $message }}
        </p>
    @enderror
    <div class="mb-3 row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
            <a href="{{ route('product.hi')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
    </div>
    </form>
@endsection
