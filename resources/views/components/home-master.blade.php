<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="Strona szkoły - marketplace" />
        <meta name="author" content="Henryk Wołek" />

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.0/css/font-awesome.min.css"
        />

        <title>Shop Homepage - Start Bootstrap Template</title>

        <!-- Bootstrap core CSS -->
        <link
            href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"
            rel="stylesheet"
        />

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet" />
    </head>

    <body>
        <!-- Navigation -->
        <nav
            class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow"
        >
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"
                    >Marketplace project</a
                >
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarResponsive"
                    aria-controls="navbarResponsive"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">
                                <button type="button" class="btn btn-dark">
                                    Strona główna
                                </button>
                            </a>
                        </li>
                        @if (Auth::check())
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="{{route('user-show-profile', Auth::user())}}"
                            >
                                <button type="button" class="btn btn-dark">
                                    {{Auth::user()->name}}
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/logout') }}">
                                <button type="button" class="btn btn-dark">
                                    Wyloguj się
                                </button>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <button type="button" class="btn btn-dark">
                                    Logowanie
                                </button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <button type="button" class="btn btn-dark">
                                    Rejestracja
                                </button>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                @yield('shop-content') @yield('user-profile-content')
                @yield('user-editing-profile') @yield('user-create-post')
                @yield('shop-item') @yield('post-edit')
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->

        <!-- Footer -->
        <footer class="py-5 bg-dark shadow">
            <div class="container">
                <p class="m-0 text-center text-white">
                    Copyright &copy; Your Website 2020
                </p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{
                asset('vendor/bootstrap/js/bootstrap.bundle.min.js')
            }}"></script>
    </body>
</html>
