<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.html">Sports Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('/')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('post.create')}}">Create Post</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{route('contact')}}">Contact</a></li>
                </ul>


            </div>

        </div>

            @if (Route::has('login'))
                <div class="top-right links" >
                    @auth
                        <a href="{{ url('/home') }}" style="color:white">Home</a>
                    @else
                    <a href="{{ route('login') }}" style="color:white" >Login</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" style="color:white;padding-right:4px" >Register</a>
                        @endif
                    @endauth
                </div>
            @endif

    </nav>

