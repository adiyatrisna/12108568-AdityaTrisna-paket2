@extends('layouts')
@section('content')

<h1 class="m-0">Create Product</h1>
</hr>
<form action="{{ route('storeProduct') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col">
            <label for="product" class="form-label">Nama Product</label>
            <input type="text" class="form-control" name="NmProduct">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="Harga">Harga</label>
            <input type="text" class="form-control" name="Harga">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <label for="Stok">Stok</label>
            <input type="text" class="form-control" name="Stok">
        </div>
    </div>
    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>


@endsection