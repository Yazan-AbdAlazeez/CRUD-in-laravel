<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <button type="button" class="btn btn-dark" onclick="window.location='{{ route('posts.index') }}'">Post
            Management</button>
    </div>
    <div class="content mt-3">
        @yield('content')
    </div>
</body>

</html>