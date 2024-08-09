<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Blogs</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
        <link rel="stylesheet" href="search-button.css" /> <!-- Link to the separated CSS file -->

        <style>
            html,
            body {
                margin: 0;
                padding: 0;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            body {
                background-image: url("https://ultraformer.com/wp-content/uploads/sites/428/2017/03/main_social_bg-1024x587.jpg");
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                flex: 1;
            }

            .container {
                flex: 1;
            }

            .btn-dark {
                display: inline-flex;
                align-items: center;
                padding: 10px 20px;
                border-radius: 5px;
                margin-bottom: 20px;
            }

            .btn-dark i {
                margin-right: 10px;
            }

            .navbar-nav .nav-item .nav-link {
                padding: 0.5rem 1rem;
            }

            .navbar .nav-link,
            .navbar .navbar-brand{
                color: #fff !important;
            }

            .navbar .search-bar {
                width: 100%;
                max-width: 300px;
            }

            /* Search button color to white */
            .btn-outline-success {
                border-color: #fff;
                color: #fff;
            }

            .btn-outline-success:hover {
                background-color: #fff;
                color: #000;
            }

            .card {
                height: 450px;
                display: flex;
                flex-direction: column;
                transition: transform 0.2s ease, box-shadow 0.2s ease;
                border-radius: 15px;
                overflow: hidden;
            }

            .card:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }

            .card-img-top {
                max-height: 200px;
                object-fit: cover;
            }

            .card-body {
                display: flex;
                flex-direction: column;
                flex-grow: 1;
                padding: 15px;
            }

            .card-title {
                color: #007bff;
                font-size: 1.25rem;
                font-weight: bold;
                margin-bottom: 0.5rem;
            }

            .card-subtitle {
                color: #6c757d;
                font-size: 0.875rem;
                margin-bottom: 1rem;
            }

            .card-text {
                color: #343a40;
                flex-grow: 1;
                margin-bottom: 1rem;
            }

            .card-footer {
                background-color: #f8f9fa;
                padding: 0.75rem 1.25rem;
                text-align: right;
                color: #6c757d;
                font-size: 0.875rem;
            }

            /* Read More button color to black */
            .btn-outline-success.btn-sm {
                border-color: #000;
                color: #000;
            }

            .btn-outline-success.btn-sm:hover {
                background-color: #000;
                color: #fff;
            }

            .btn-outline-danger {
                border-color: #dc3545;
                color: #dc3545;
            }

            .btn-outline-danger:hover {
                background-color: #dc3545;
                color: white;
            }

            .modal .modal-dialog {
                max-width: 600px;
            }

            .modal .modal-header,
            .modal .modal-body,
            .modal .modal-footer {
                padding: 15px;
            }

            .modal .modal-title {
                color: #007bff;
                font-size: 1.25rem;
                font-weight: bold;
            }

            .navbar {
                background-image: url('https://www.itlearn360.com/wp-content/uploads/2018/09/Footer-Background-Image.png'); /* Replace with your image URL */
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                color: #fff;
            }

            .navbar .user-info {
                margin-left: auto;
                display: flex;
                align-items: center;
            }

            .navbar .user-info span {
                margin-right: 10px;
                color: #f8f5f5;
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
        </style>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <a class="navbar-brand" href="#">BlogSite</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs">My Blogs</a>
                    </li>
                    {{--  <!-- Add any additional nav items here -->  --}}
                </ul>
                <form class="form-inline my-2 my-lg-0 ml-auto search-bar" action="{{ route('search') }}" method="GET">
                    <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search" />
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
                    @endguest @auth
                    <div class="user-info">
                        <span>{{ Auth::user()->name }}</span>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </div>
                    @endauth
                </ul>
            </div>
        </nav>

        <!-- Blog Posts -->
        <div class="container mt-4">
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($blog->photo) @php $photos = json_decode($blog->photo); @endphp @if(count($photos) > 0)
                        <img src="{{ Storage::url($photos[0]) }}" class="card-img-top" alt="Blog Photo" />
                        @else
                        <img src="{{ asset('default-photo.png') }}" class="card-img-top" alt="Default Photo" />
                        @endif @else
                        <img src="{{ asset('default-photo.png') }}" class="card-img-top" alt="Default Photo" />
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title_name }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">By {{ $blog->author }}</h6>
                            <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                            <button
                                class="btn btn-outline-success btn-sm"
                                data-toggle="modal"
                                data-target="#blogModal"
                                data-title="{{ $blog->title_name }}"
                                data-author="{{ $blog->author }}"
                                data-content="{{ $blog->content }}"
                                data-date="{{ $blog->published_date }}"
                                data-image="{{ count($photos) > 0 ? Storage::url($photos[0]) : asset('default-photo.png') }}"
                            >
                                Read More
                            </button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Published on {{ $blog->published_date }}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div>
                {{-- Pagination Links --}} {{ $blogs->links() }}
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="blogModalLabel">Blog Title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="modalImage" src="" class="img-fluid mb-3" alt="Blog Image" />
                        <h6 class="modal-author">By Author</h6>
                        <p class="modal-content-text">Content</p>
                    </div>
                    <div class="modal-footer">
                        <small class="text-muted modal-date">Published on Date</small>
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

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            $("#blogModal").on("show.bs.modal", function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var title = button.data("title"); // Extract info from data-* attributes
                var author = button.data("author");
                var content = button.data("content");
                var date = button.data("date");
                var image = button.data("image");

                var modal = $(this);
                modal.find(".modal-title").text(title);
                modal.find(".modal-author").text("By " + author);
                modal.find(".modal-content-text").text(content);
                modal.find(".modal-date").text("Published on " + date);
                modal.find("#modalImage").attr("src", image);
            });
        </script>
    </body>
</html>
