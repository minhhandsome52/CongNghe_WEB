<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <style>
        .card-title {
            color: #FFD700; /* Màu vàng nhạt */
        }
    </style>
    <title>Posts</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="{{ route('posts.index') }}">CRUD Posts</a>
            <div class="ms-auto">
                <a class="btn btn-sm btn-success" href="{{ route('posts.create') }}">Add Post</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">{{ $post->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb+6k6Jr59O2tsQX0E9D8pt7zWcxzQ0Xu5t//Y4Ccx0aXuFO9X" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0pL5vAX0VV+q5NGmK6Ad0FfG0pS6Uw9pJsQm77kc29wGVzH2" crossorigin="anonymous"></script>
</body>
</html>
