<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



// =====|| API CONTROLLERS
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WorksController;
use App\Http\Controllers\Api\UserController;



// =====|| PUBLIC API ROUTES
Route::get('/work', [WorksController::class, 'index'])->name('api.work.index');
Route::post('/work', [WorksController::class, 'store'])->name('api.work.store');
Route::get('/work/{id}', [WorksController::class, 'edit'])->name('api.work.edit');
Route::post('/work/{id}/update', [WorksController::class, 'update'])->name('api.work.update');
Route::delete('/work/{id}/delete', [WorksController::class, 'destroy'])->name('api.work.destroy');



// =====|| AUTH ROUTES (PUBLIC)
Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');



// =====|| PROTECTED ROUTES (SANCTUM)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('api.user.profile');

    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
});