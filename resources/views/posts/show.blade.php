@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <img src="/images/posts/{{ $post->image }}" class="img-fluid rounded mb-3" style="max-width: 100%; height: auto;"
            alt="{{ $post->title }}">
        <p class="card-text" style="font-size: 1.2rem;">{{ $post->description }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    </div>
@endsection
