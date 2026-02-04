<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css">

    <style>
        /* Sidebar стиль */
        body {
            display: flex;
            min-height: 100vh;
        }
        #sidebar {
            width: 220px;
            background: #f8f9fa;
            padding: 20px;
        }
        #content {
            flex: 1;
            padding: 20px;
        }
        .sidebar-link {
            display: block;
            padding: 8px 12px;
            color: #333;
            text-decoration: none;
            margin-bottom: 5px;
            border-radius: 4px;
        }
        .sidebar-link:hover {
            background: #e2e6ea;
        }
    </style>
</head>
<body>
<!-- Sidebar -->
<div id="sidebar">
    <h4>{{ config('app.name', 'Laravel') }}</h4>
    <a href="{{ route('patients.index') }}" class="sidebar-link">Patients</a>
    <a href="{{ route('diseases.index') }}" class="sidebar-link">Diseases</a>
    <hr>
    @guest
        @if (Route::has('login'))
            <a class="sidebar-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        @endif
        @if (Route::has('register'))
            <a class="sidebar-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    @else
        <a class="sidebar-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout ({{ Auth::user()->name }})
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    @endguest
</div>

<!-- Main content -->
<div id="content">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <main>
        <div class="container">
            <!-- Success message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops! There were some problems with your input:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @yield('content')
    </main>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
