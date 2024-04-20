
@extends('layouts')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-">
        <h6 class="m-0 font-weight-bold text-primary">Detail Sale</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Quantitiy</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($saleDetail as $detail)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $detail->Product->NmProduct  ?? 'Product not Avaible' }}</th>
                        <th>{{ $detail->JmlProduct }}</th>
                        <th>Rp {{ number_format($detail->Subtotal, 2, ',', '.') }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('indexSale') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
    </div>
</div>
@endsection
