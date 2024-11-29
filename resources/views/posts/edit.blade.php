@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" required>{{ $post->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="images" class="form-label">Images</label>
                <input type="file" name="images[]" class="form-control" multiple required>
                {{-- <img src="/images/posts/{{ $post->image }}" class="img-fluid mt-2" alt="{{ $post->title }}"> --}}
                <div class="mt-2">
                    @foreach ($post->images as $image)
                        <img src="/images/posts/{{ $image }}" class="img-fluid mt-2" alt="{{ $post->title }}"
                            style="max-width: 100px;">
                    @endforeach
                </div>

            </div>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
