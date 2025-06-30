<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Pengelola Barang')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1d3557, #457b9d);
            color: white;
        }

        .navbar {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background: linear-gradient(to right, #1d3557, #457b9d);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.7rem;
            color: #f1faee !important;
        }

        .nav-link {
            font-weight: 500;
            color: #f1faee !important;
            position: relative;
        }

        .nav-link:hover::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #a8dadc;
        }

        .container {
            max-width: 960px;
        }

        .card {
            border: none;
            border-radius: 1rem;
            background-color: rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 25px rgba(5, 54, 106, 0.1);
            color: white;
        }

        .card:hover {
            transform: scale(1.01);
            transition: transform 0.2s ease-in-out;
        }

        .table {
            color: white;
        }

        .table thead {
            background-color: rgba(241, 250, 238, 0.2);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        footer {
            background-color: #1d3557;
            color: #f1faee;
            padding: 1rem 0;
            text-align: center;
            font-size: 0.95rem;
        }

        main {
            flex: 1;
        }

        .alert {
            border-radius: 0.75rem;
        }

        .btn-success {
            background-color: #2a9d8f;
            border: none;
        }

        .btn-warning {
            background-color: #e9c46a;
            border: none;
            color: black;
        }

        .btn-danger {
            background-color: #e63946;
            border: none;
        }

        .btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">📦Toko Sembako</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="container my-5">
        @if (session('success'))
            <div class="alert alert-success shadow-sm bg-opacity-75">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger shadow-sm bg-opacity-75">{{ session('error') }}</div>
        @endif

        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} Aplikasi Pengelola Barang. Dibuat dengan ❤️ oleh <strong>The Girls</strong>.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>