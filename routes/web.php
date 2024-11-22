<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainerRequestController;
use App\Http\Controllers\TrainerSessionController;
use App\Models\TrainerSession;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Landing_Page.landing_page');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // * admin
    Route::put('/request/approve/{user}', [TrainerRequestController::class, 'update'])->name('request.approve');
    Route::get('/admin/dashboard', [DashboardController::class, 'admindashboard'])->name('admin.dashboard');
    Route::get('/admin/trainer/request', [DashboardController::class, 'trainerRequest'])->name('admin.requests');
    Route::get('/admin/all-users', [DashboardController::class, 'showUsers'])->name('admin.users');
    Route::put('/request/approve/{user}', [TrainerRequestController::class, 'update'])->name('request.approve');
    Route::delete('/delete/user/{user}', [RegisteredUserController::class, 'remove'])->name('user.remove');


    //*trainer

    Route::get('/main/dashboard', [DashboardController::class, 'trainerdashboard'])->name('main.dashboard');
    Route::get('/trainer/sessions', [DashboardController::class, 'trainerSessions'])->name('trainer.sessions');

        //*sessions
    Route::post('/create/session', [TrainerSessionController::class, 'store'])->name('create.session');
    Route::delete('/session/destroy/{session}', [TrainerSessionController::class, 'destroy'])->name('session.destroy');
    Route::get('/session/edit/{session}', [TrainerSessionController::class, 'edit'])->name('session.edit');
    Route::put('/session/update/{session}', [TrainerSessionController::class, 'update'])->name('session.update');
    Route::get('/create/session', [TrainerSessionController::class, 'create'])->name('create.session');

        //* Session calendar

    Route::get('/session/calendar', [DashboardController::class, 'sessionCalendar'])->name('session.calendar');

        //* Exercices
    Route::get('trainer/exercices', [DashboardController::class, 'trainerExercices'])->name('trainer.exercices');

    Route::post('/create/exercices', [ExerciceController::class, 'store'])->name('exercice.store');




});


Route::get('/get-fit', [LandingPageController::class, 'index'])->name('guest-app');



require __DIR__.'/auth.php';
