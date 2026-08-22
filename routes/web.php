<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// =====|| FRONTEND CONTROLLERS
use App\Http\Controllers\Frontend\HomeController; 
use App\Http\Controllers\Frontend\LanguageController;



// =====|| FRONTEND ROUTES
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/', [HomeController::class, 'contact'])->name('user.message');
Route::get('/blog/{id}', [HomeController::class, 'blog'])->name('blog');
Route::get('/lang/change', [LanguageController::class, 'langChange'])->name('lang.change');



// =====|| AUTHENTICATION ROUTES (LOGIN, REGISTER, PASSWORD, RESES)
Auth::routes();