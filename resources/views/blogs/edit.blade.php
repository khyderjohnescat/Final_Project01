<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://ultraformer.com/wp-content/uploads/sites/428/2017/03/main_social_bg-1024x587.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .form-label {
            font-weight: bold;
            color: #495057;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004494;
        }

        .photo-preview img {
            max-width: 100px;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group input,
        .form-group textarea {
            border-radius: 5px;
            padding: 10px;
            font-size: 14px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 8px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ url('blogs') }}" class="btn btn-primary">Blogs List</a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2>Edit Blog</h2>
                    <form action="{{ url('blogs', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-4">
                            <label class="form-label">Title</label>
                            <input type="text" name="title_name" class="form-control" value="{{ old('title_name', $blog->title_name) }}" required />
                            @error('title_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author', $blog->author) }}" required />
                            @error('author')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Content</label>
                            <textarea name="content" class="form-control" rows="6" required>{{ old('content', $blog->content) }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Photos</label>
                            <input type="file" name="photos[]" class="form-control" multiple />
                            @error('photos.*')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!-- Display current photos if available -->
                            @if($blog->photo)
                            <div class="photo-preview mt-3 d-flex flex-wrap">
                                @foreach(json_decode($blog->photo) as $photo)
                                <img src="{{ asset('storage/photos/' . basename($photo)) }}" alt="Current Photo">
                                @endforeach
                            </div>
                            @endif
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Published Date</label>
                            <input type="date" name="published_date" class="form-control" value="{{ $blog->published_date ?? '' }}" required />
                            @error('published_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                        </div>
                    </form>
                </div>
                <div class="footer">
                    © 2024 BlogSite. All rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
