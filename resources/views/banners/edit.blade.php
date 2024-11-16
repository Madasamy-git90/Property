@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Edit Banner</h1>
    <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $banner->title) }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            @if($banner->image)
                <img src="{{ asset('storage/' . $banner->image) }}" alt="Banner Image" width="100">
            @endif
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description">{{ old('description', $banner->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Update Banner</button>
    </form>
</div>
@endsection
