@extends('layouts.app')

@section('content')
<div style="max-width: 400px; margin: 50px auto;">
    <h2>Login</h2>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div>
            <label>Username:</label>
            <input type="text" name="username" required class="form-control">
        </div>
        <div class="mt-2">
            <label>Password:</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <button class="btn btn-primary mt-3">Login</button>
    </form>

    <p class="mt-3">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
</div>
@endsection
