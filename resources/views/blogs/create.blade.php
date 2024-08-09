<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create a Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" />
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
            margin-bottom: 50px;
        }

        .form-label {
            font-weight: bold;
            color: #495057;
        }

        .btn-primary{
            margin-bottom: 10px;
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

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            margin-top: 20px;
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

        footer {
            background-image: url('https://www.itlearn360.com/wp-content/uploads/2018/09/Footer-Background-Image.png'); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff; /* White text for contrast */
            padding: 20px 0;
            text-align: center;
            position: relative;
            z-index: 1;
            margin: 0; /* Remove margin */
            width: 100%; /* Make footer full width */
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0px;
            border-radius: 5px;
        }

        .footer-content h2 {
            margin-bottom: 5px;
            font-size: 24px;
        }

        .footer-content p {
            margin: 5px 0;
            font-size: 14px;
        }

        .footer-content a {
            color: #fff;
            text-decoration: underline;
        }

        .footer-content a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2>Create a Blog</h2>
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="form-label">Title</label>
                            <input type="text" name="title_name" class="form-control" value="{{ old('title_name') }}" required />
                            @error('title_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control" value="{{ old('author') }}" required />
                            @error('author')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Content</label>
                            <textarea name="content" class="form-control" rows="6" required>{{ old('content') }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Published Date</label>
                            <input type="date" name="published_date" class="form-control" value="{{ old('published_date') }}" required />
                            @error('published_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label">Photos</label>
                            <input type="file" name="photo[]" class="form-control" multiple required />
                            @error('photo.*')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary w-100">Upload Blog</button>
                            <a href="javascript:history.back()" class="btn btn-secondary w-100 mb-3">Back</a> <!-- Back Button -->
                        </div>
                    </form>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <h2>SiteBlog</h2>
            <p>© 2024 SiteBlog. All rights reserved.</p>
            <p>Built with passion by <a href="https://laravel.com/">Laravel</a>.</p>
            <p>
                <a href="/privacy-policy">Privacy Policy</a> | 
                <a href="/terms-of-service">Terms of Service</a> | 
                <a href="/contact">Contact</a>
            </p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
