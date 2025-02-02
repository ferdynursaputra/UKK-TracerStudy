<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\AlumniLoginController;
use App\Http\Controllers\AlumniProfileController;
use App\Http\Controllers\Admin\{
    BidangKeahlianController,
    ProgramKeahlianController,
    KonsentrasiKeahlianController,
    TahunLulusController,
    AlumniController,
    TracerKuliahController,
    TracerKerjaController,
    StatusAlumniController,
    TestimoniController,
    SekolahController
};

// ==============================
// ROUTES UNTUK ADMIN
// ==============================

// Halaman Welcome Admin
Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

// Admin Logout
Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect('/admin');
})->name('admin.logout');

// Route untuk Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
});

// Admin Dashboard dan Resource Routes
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    // Dashboard
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Resource Routes
    Route::resource('bidang-keahlian', BidangKeahlianController::class);
    Route::resource('program-keahlian', ProgramKeahlianController::class);
    Route::resource('konsentrasi-keahlian', KonsentrasiKeahlianController::class);
    Route::resource('tahun-lulus', TahunLulusController::class);
    Route::get('tahun-lulus/{tahunLulus}/edit', [TahunLulusController::class, 'edit'])->name('tahun-lulus.edit');
    Route::put('tahun-lulus/{tahunLulus}/update', [TahunLulusController::class, 'update'])->name('tahun-lulus.update');
    // Route::resource('alumni', AlumniController::class);
    Route::get('alumni', [AlumniController::class, 'index'])->name('alumni.index');
    Route::post('alumni', [AlumniController::class, 'store'])->name('alumni.store');
    Route::get('alumni/{alumni}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
    Route::get('alumni/create', [AlumniController::class, 'create'])->name('alumni.create');
    Route::put('alumni/{alumni}/update', [AlumniController::class, 'update'])->name('alumni.update');
    Route::get('alumni/{alumni}', [AlumniController::class, 'show'])->name('alumni.show');
    Route::delete('alumni/{alumni}/destroy', [AlumniController::class, 'destroy'])->name('alumni.destroy');
    // Route::put('alumni/{alumni}', [AlumniController::class, 'update'])->name('status-alumni.update');
    Route::resource('tracer-kuliah', TracerKuliahController::class);
    Route::resource('tracer-kerja', TracerKerjaController::class);
    Route::resource('status-alumni', StatusAlumniController::class);
    Route::get('status-alumni/{statusAlumni}/edit', [StatusAlumniController::class, 'edit'])->name('status-alumni.edit');
    Route::put('status-alumni/{statusAlumni}/update', [StatusAlumniController::class, 'update'])->name('status-alumni.update');
    Route::resource('testimoni', TestimoniController::class);
    Route::resource('sekolah', SekolahController::class); 
});

// ==============================
// ROUTES UNTUK ALUMNI
// ==============================

// Alumni Login
// Route untuk Alumni
Route::prefix('alumni')->group(function () {
    Route::get('/login', [AlumniLoginController::class, 'showLoginForm'])->name('alumni.login');
    Route::post('/login', [AlumniLoginController::class, 'login'])->name('alumni.login.submit');
    Route::post('/logout', [AlumniLoginController::class, 'logout'])->name('alumni.logout');
});

// Alumni Profile
Route::get('/alumni/profile', [AlumniProfileController::class, 'index'])->name('alumni.profile');
Route::get('/alumni/profile/edit', [AlumniProfileController::class, 'edit'])->name('alumni.profile.edit');
Route::put('/alumni/profile/update', [AlumniProfileController::class, 'update'])->name('alumni.profile.update');

// Alumni Dashboard
Route::middleware('auth:alumni')->group(function () {
    Route::get('/dashboard', [FrontEndController::class, 'dashboard'])->name('alumni.dashboard');
});

// Alumni Fitur
Route::middleware(['auth:alumni'])->group(function () {
    Route::get('/autentikasi', [FrontEndController::class, 'autentikasi'])->name('alumni.autentikasi');
    Route::post('/autentikasi', [FrontEndController::class, 'autentikasiStore'])->name('alumni.autentikasiStore');
    Route::get('/testimoni', [TestimoniController::class, 'index'])->name('alumni.testimoni');
    Route::post('/testimoni', [TestimoniController::class, 'storeAlumni'])->name('alumni.testimoni.store');
    Route::post('/tracerKuliah', [FrontEndController::class, 'storeTracerKuliah'])->name('alumni.tracerKuliah.store');
    Route::post('/tracerKerja', [FrontEndController::class, 'storeTracerKerja'])->name('alumni.tracerKerja.store');
    Route::get('/tracer-kuliah/create', [FrontEndController::class, 'createTracerKuliah'])->name('alumni.tracer-kuliah.create');
    Route::delete('/testimoni/{id_alumni}', [TestimoniController::class, 'destroyTestimoniDashboard'])->name('testimoni.destroy');
});

// ==============================
// ROUTES UNTUK FRONTEND (UMUM)
// ==============================

// Frontend Routes
Route::get('/', [FrontEndController::class, 'index'])->name('home');
Route::get('/daftar', [FrontEndController::class, 'create'])->name('frontend.daftar');
Route::post('/store', [FrontEndController::class, 'store'])->name('frontend.store');

// Redirect Login Default
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('admin.register.submit');