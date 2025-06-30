@extends('layouts.app')

@section('content')
<div style="max-width: 400px; margin: 50px auto;">
    <h2>Register</h2>

    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div>
            <label>Username:</label>
            <input type="text" name="username" required class="form-control">
        </div>
        <div class="mt-2">
            <label>Password:</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <div class="mt-2">
            <label>Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" required class="form-control">
        </div>
        <button class="btn btn-success mt-3">Daftar</button>
    </form>

    <p class="mt-3">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
</div>
@endsection
