@extends('layouts')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sale</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('createSale') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>   
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale as $sl )
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $sl->Customer->NmCust }}</th>
                        <th>Rp {{ number_format($sl->TtlPrice, 2, '.', ',') }}</th>
                        <th>{{ $sl->TglSale }}</th>
                        <th>
                            <button type="button" onclick="window.location='{{ route('detailSale', $sl->id) }}'" class="btn btn-info"><i class="fa fa-info">Detail</button></th>                                          
                    @endforeach
                    </tr>    
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection