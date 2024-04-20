@extends('layouts')
@section('content')
<h1 class="mb-0 ">Create Sale</h1>
<form action="{{ route('storeSale') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Customer</label>
                    <input type="text" class="form-control" name="NmCust">
                </div>
                <div class="form-group">
                    <label for="name">Address</label>
                    <input type="text" class="form-control" name="Address">
                </div>
                <div class="form-group">
                    <label for="address">Telephone</label>
                    <input type="text" class="form-control" name="Phone">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="TglSale">
                </div>
                <div class="card-header py-2">
                </div>
                <div class="card-body" id="saleForm">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="product">Product</label>
                            <select name="product_id[]" id="product" class="form-control" required>
                                <option value="">Choose Product</option>
                                @foreach($chProduct as $cp)
                                <option value="{{ $cp->id }}">{{ $cp->NmProduct }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="quantitiy">Quantitiy</label>
                            <input type="number" class="form-control" name="JmlProduct[]" required>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" id="addSaleItem"><i class="fa fa-plus"></i></button>
                <script>
                    document.getElementById('addSaleItem').addEventListener('click', function() {
                        var  saleForm = document.getElementById('saleForm');
                        var  newSaleItem = saleForm.cloneNode(true);
                        saleForm.parentNode.insertBefore(newSaleItem, this);
                    });
                </script>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Save</button>
                    <a href="{{ route('indexSale') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection