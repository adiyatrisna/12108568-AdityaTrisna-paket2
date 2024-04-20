@extends('layouts')
@section('content')

<h1 class="m-0">Edit Product</h1>
</hr>
<form action="{{ route('updateProduct', $product->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="row mb-3">
        <div class="col">
            <label for="product" class="form-label">Nama Product</label>
            <input type="text" value="{{ $product->NmProduct }}" class="form-control" name="NmProduct">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="Harga">Harga</label>
            <input type="text" value="{{ $product->Harga }}" class="form-control" name="Harga">
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>

@endsection