<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Aplikasi Pengelola Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1d3557, #457b9d);
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .btn-custom {
            background-color: #f1faee;
            color: #1d3557;
            border-radius: 30px;
            padding: 10px 25px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #a8dadc;
            color: #000;
        }
    </style>
</head>
<body>
    <div>
        <h1 class="display-4 fw-bold">Aplikasi Pengelola Barang</h1>
        <p class="lead">Kelola barang masuk dan keluar dengan mudah dan efisien.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-custom mt-3">Masuk Aplikasi</a>
    </div>
</body>
</html>