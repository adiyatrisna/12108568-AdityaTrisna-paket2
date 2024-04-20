@extends('layouts')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List User</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('createUser') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $us )
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $us->email }}</th>
                        <th>{{ $us->role }}</th>
                        <th class="d-flex gap-1">
                            <a href="{{ route('editUser', $us->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('deleteUser', $us->id) }}" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>






@endsection