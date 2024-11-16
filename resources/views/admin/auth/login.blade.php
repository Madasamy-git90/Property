@extends('admin.layout')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <form action="{{ route('admin.authenticate') }}" method="POST" class="w-25">
        @csrf
        <h3 class="text-center">Admin Login</h3>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
