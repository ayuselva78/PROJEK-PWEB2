@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">

    {{-- Baris atas: Salam & tombol Logout --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="text-white m-0">Halo, {{ Auth::user()->username }} 👋</h4>
        <a href="{{ route('logout') }}" class="btn btn-secondary"
           onclick="return confirm('Yakin ingin logout?')">Logout</a>
    </div>

    <h2 class="fw-bold mb-4 text-center text-white">📊 Dashboard Pengelola Barang</h2>

    <div class="row">
        <!-- Total Barang -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 bg-gradient-primary text-white h-100"
                 style="background: linear-gradient(135deg, #007bff, #0056b3); border-radius: 1rem;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-box-seam display-4"></i>
                    </div>
                    <h5 class="card-title">Total Barang</h5>
                    <h2 class="fw-bold">{{ $totalBarang }}</h2>
                    <a href="{{ route('barang.index') }}" class="btn btn-outline-light mt-3">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Barang Masuk -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 text-white h-100"
                 style="background: linear-gradient(135deg, #28a745, #1e7e34); border-radius: 1rem;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-box-arrow-in-down display-4"></i>
                    </div>
                    <h5 class="card-title">Barang Masuk</h5>
                    <h2 class="fw-bold">{{ $totalMasuk }}</h2>
                    <a href="{{ route('barang-masuk.index') }}" class="btn btn-outline-light mt-3">Lihat Detail</a>
                </div>
            </div>
        </div>

        <!-- Barang Keluar -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 text-white h-100"
                 style="background: linear-gradient(135deg, #dc3545, #a71d2a); border-radius: 1rem;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="bi bi-box-arrow-up display-4"></i>
                    </div>
                    <h5 class="card-title">Barang Keluar</h5>
                    <h2 class="fw-bold">{{ $totalKeluar }}</h2>
                    <a href="{{ route('barang-keluar.index') }}" class="btn btn-outline-light mt-3">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
