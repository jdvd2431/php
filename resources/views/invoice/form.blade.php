@extends('layout')
@section('title', 'Facturas')
    @section('word', 'Listado Facturas')

@section('content')

    <form action="" method="POST">
        <div class="row">
            <div class="col-sm-3">
                <select name="product[]" id="product" class="form-select">
                    @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <input type="number" name="quantity[]" id="quantity"min="1" class="form-control">
            </div>
        </div>
        <div class="mb-3 mt-5 row">
            <div class="col-xm-2"></div>
            <div class="col-sm-3">
                <a href="{{ route('invoices.hi')}}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
        </div>
    </form>

@endsection
@section('scripts')
<script>
    alert('hola');
</script>
@endsection
