@extends('layouts')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('createProduct') }}" class="btn btn-primary"><i class="fa fa-plus"></i></i></a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $pr )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pr->NmProduct }}</td>
                        <th>Rp {{ number_format($pr->Harga, 2, ',', '.') }}</th>
                        <td>{{ $pr->Stok }}</td>
                        <td class="d-flex gap-1">
                            <a href="{{ route('editProduct', $pr->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('deleteProduct', $pr->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection