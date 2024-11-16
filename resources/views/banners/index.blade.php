@extends('admin.layout')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">All Banners</h1>
    <a href="{{ route('banner.create') }}" class="btn btn-primary mb-4">Create New Banner</a>

    <!-- Card Section for Banners -->
    <div class="row">
        @foreach($banners as $banner)
        <div class="col-md-4">
            <div class="card shadow-sm mb-4" style="border-radius: 10px;">
                <!-- Banner Image -->
                <img src="{{ asset('storage/' . $banner->image) }}" class="card-img-top" alt="Banner Image" style="height: 200px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">

                <div class="card-body">
                    <!-- Project Title -->
                    <h5 class="card-title text-truncate" style="max-width: 100%; font-weight: bold;">Project : {{ $banner->title }}</h5>

                    <!-- Banner Description -->
                    <p class="card-text text-muted text-truncate" style="max-width: 100%;">Alt Text : {{ $banner->description }}</p>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('banner.destroy', $banner->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
