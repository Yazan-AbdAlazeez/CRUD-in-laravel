@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
        <div class="row mt-3">
            @forelse ($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="/images/posts/{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }}</p>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-success">show</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        No posts available. Please create a post.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection