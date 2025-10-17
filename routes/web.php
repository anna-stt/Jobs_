<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\CvController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('auth.create'));

Route::resource('jobs', JobController::class)
    ->only(['index', 'show']);


Route::get('login', fn() => to_route('auth.create'))
    ->name('login');
Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);

Route::delete('logout', fn() => to_route('auth.destroy'))
    ->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::resource('user', UserController::class)
    ->only(['create', 'store']);

Route::resource('job.jobApplications.cv', CvController::class)
    ->scoped()->only('index');


Route::middleware('auth')->group(function () {
    Route::resource('job.application', JobApplicationController::class)
        ->only(['create', 'store']);

    Route::resource('my-job-application', MyJobApplicationController::class)
        ->only(['index', 'destroy']);

    Route::resource('employer', EmployerController::class)
        ->only(['create', 'store']);

    Route::get('/my-user', [MyUserController::class, 'index'])->name('my-user.index');
    Route::get('/my-user/edit', [MyUserController::class, 'edit'])->name('my-user.edit');
    Route::put('/my-user', [MyUserController::class, 'update'])->name('my-user.update');

    Route::middleware('employer')
        ->resource('my-jobs', MyJobController::class);
});
