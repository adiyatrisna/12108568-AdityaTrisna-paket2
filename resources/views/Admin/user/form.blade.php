@extends('layouts')
@section('content')

<form action="{{ isset($user) ? route('updateUser', $user->id) : route('storeUser') }}" method="POST">
@csrf
<div class="row">
    <div class="col md-3">
        <div class="card-body">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($user) ? 'Edit User' : 'Create User'  }}</h6>
            <hr>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ isset($user) ? $user->email : ''  }}">
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    <option value="admin" {{ isset($user) && $user->role == 'admin' ? 'selected' : '' }}>👑 Admin</option>
                    <option value="petugas" {{ isset($user) && $user->role == 'petugas' ? 'selected' : '' }}>👷 Petugas</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</div>
</form>

<style>
    #role option {
        background-color: #f8f9fa; /* Warna latar belakang */
        padding: 10px;
        border-radius: 5px;
        margin: 5px;
    }

    #role option:hover {
        background-color: #e9ecef; /* Warna latar belakang saat dihover */
    }
</style>

@endsection
