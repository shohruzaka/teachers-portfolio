<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboard;

/*
|--------------------------------------------------------------------------
| Web Routes 
|--------------------------------------------------------------------------
*/

// Ochiq sahifalar
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/download/{file_url}', [MainController::class, 'download'])->name('download');
Route::get('/downloadid/{id}', [MainController::class, 'downloadid'])->name('downloadid');

// GitHub OAuth
Route::middleware('guest')->group(function () {
    Route::get('/auth/github/redirect', [SocialAuthController::class, 'redirectToGithub'])->name('auth.github');
    Route::get('/auth/github/callback', [SocialAuthController::class, 'handleGithubCallback'])->name('auth.github.callback');
});

// Faqat tizimga kirgan foydalanuvchilar uchun
Route::middleware('auth')->group(function () {
    // Yo'naltiruvchi marshrut
    Route::get('/cabinet', [MainController::class, 'cabinet'])->name('cabinet');
    
    // Maqolalar (Policy orqali himoyalangan)
    Route::resource('/articles', ArticleController::class);

    // Admin paneli (Spatie role orqali himoyalangan)
    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
        
        Route::controller(DepartmentController::class)->name('department.')->group(function () {
            Route::post('/create', 'create')->name('create');
        });
    });

    // O'qituvchi paneli (Spatie role orqali himoyalangan)
    Route::middleware(['role:Teacher'])->group(function () {
        Route::get('/teacher/dashboard', [TeacherDashboard::class, 'index'])->name('teacher.dashboard');
    });
});
