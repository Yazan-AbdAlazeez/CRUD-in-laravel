@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container mt-4">
            <button type="button" class="btn btn-dark" onclick="window.location='{{ route('posts.index') }}'">Post
                Management</button>
            <h1>Users</h1>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
