@extends('layout')

@section('content')
<div class="container mt-5">
    <!-- Overview Section -->
    <h2>Overview Section</h2>
    <div class="row">
        @foreach($overviews as $overview)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('storage/' . $overview->image) }}" class="card-img-top" alt="{{ $overview->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $overview->title }}</h5>
                    <form action="{{ route('overview.delete', $overview->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <form action="{{ route('overview.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Overview</button>
    </form>

    <!-- Pointer Section -->
    <h2 class="mt-5">Pointer Section</h2>
    <div class="row">
        @foreach($pointers as $pointer)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('storage/' . $pointer->logo) }}" class="card-img-top" alt="Pointer Logo">
                <div class="card-body">
                    <p class="card-text">{{ $pointer->description }}</p>
                    <form action="{{ route('pointer.delete', $pointer->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <form action="{{ route('pointer.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Pointer</button>
    </form>
</div>
@endsection
