@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div class="d-flex flex-wrap mb-3">
            @foreach ($post->images as $image)
                <div class="me-2"> <!-- Add margin-end for spacing -->
                    <img src="/images/posts/{{ $image }}" class="img-fluid rounded" alt="{{ $post->title }}"
                        style="max-width: 30rem;"> <!-- Adjust max-width as needed -->
                </div>
            @endforeach
        </div>
        <p class="card-text" style="font-size: 1.2rem;">{{ $post->description }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    </div>
@endsection
