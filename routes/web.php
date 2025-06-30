<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\DashboardController;

// Halaman awal (landing)
Route::get('/', function () {
    return view('landing'); // Halaman awal sebelum masuk ke aplikasi
});

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/dashboard');
    }

    return back()->with('error', 'Username atau password salah!');
})->name('login.post');

// Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $request->validate([
        'username' => 'required|unique:users',
        'password' => 'required|confirmed|min:6',
    ]);

    User::create([
        'username' => $request->username,
        'password' => bcrypt($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silakan login!');
})->name('register.post');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Route yang hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('barang', BarangController::class);
    Route::resource('barang-masuk', BarangMasukController::class);
    Route::resource('barang-keluar', BarangKeluarController::class);
});