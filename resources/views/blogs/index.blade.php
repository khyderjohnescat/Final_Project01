<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blogs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .btn-dark {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        body {
            background-image: url('https://ultraformer.com/wp-content/uploads/sites/428/2017/03/main_social_bg-1024x587.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .btn-dark i {
            margin-right: 10px;
        }

        .navbar {
            background-image: url('https://www.itlearn360.com/wp-content/uploads/2018/09/Footer-Background-Image.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
        }

        .navbar-nav .nav-item .nav-link {
            padding: 0.5rem 1rem;
        }

        .navbar .search-bar {
            width: 100%;
            max-width: 300px;
        }

        .card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #f8f9fa;
        }

        .card-title {
            color: #007bff;
        }

        .card-subtitle {
            color: #6c757d;
        }

        .card-text {
            color: #343a40;
        }

        .btn-outline-success {
            border-color: #fff;
            color: #fff !important;
        }
        
        #edit {
            border-color: rgb(0, 162, 54);
            color: rgb(3, 125, 32) !important;
        }

        .btn-outline-success:hover {
            background-color: #28a745;
            color: white;
        }

        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .card-img-top {
            object-fit: fill;
            height: 200px;
        }

        .navbar .user-info {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        .navbar .user-info span {
            margin-right: 10px;
            color: #fff !important;
        }

        .content {
            flex: 1;
        }

        footer {
            background-image: url('https://www.itlearn360.com/wp-content/uploads/2018/09/Footer-Background-Image.png'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff; 
            padding: 20px 0;
            text-align: center;
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1px;
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
        
        .navbar .nav-link,
        .navbar .navbar-brand {
            color: #fff !important;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <a class="navbar-brand" href="#">BlogSite</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">My Blogs</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0 ml-auto search-bar" action="{{ route('blogs') }}" method="GET">
                <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                @endguest
                @auth
                <div class="user-info">
                    <span>{{ Auth::user()->name }}</span>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </div>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Add New Blog Button -->
    <div class="container mt-4 content">
        <div class="form-group mb-3">
            <a href="{{ url('blogs/create') }}" class="btn btn-dark"> <i class="fas fa-plus"></i> Upload New Blog </a>
        </div>

        <!-- Blog Posts -->
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($blog->photo)
                    @php
                    $photos = json_decode($blog->photo);
                    @endphp
                    @if(count($photos) > 0)
                    <img src="{{ Storage::url($photos[0]) }}" class="card-img-top" alt="Blog Photo">
                    @else
                    <img src="{{ asset('default-photo.png') }}" class="card-img-top" alt="Default Photo">
                    @endif
                    @else
                    <img src="{{ asset('default-photo.png') }}" class="card-img-top" alt="Default Photo">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $blog->title_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By {{ $blog->author }}</h6>
                        <p class="card-text flex-grow-1">{{ Str::limit($blog->content, 100) }}</p>
                        <p class="card-text"><small class="text-muted">Published on {{ $blog->published_date }}</small>
                        </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('blogs', $blog->id) }}/edit" class="btn btn-outline-success btn-sm" id="edit">Edit</a>
                            <form action="{{ url('blogs', $blog->id) }}" method="post" class="d-inline">
                                @method('delete') @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Delete this item?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div>
            {{-- Pagination Links --}}
            {{ $blogs->links() }}
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
