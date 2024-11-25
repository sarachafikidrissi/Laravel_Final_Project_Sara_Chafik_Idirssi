<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciceController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TrainerRequestController;
use App\Http\Controllers\TrainerSessionController;
use App\Models\Exercice;
use App\Models\TrainerSession;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('Landing_Page.landing_page');
})->name('home');

Route::get('/dashboard', function () {
    $exercice = Exercice::where('id', 1)->first();
    $totalSessions = TrainerSession::where('user_id', Auth::user()->id)->count();
    $totalExercices = Exercice::where('user_id', Auth::user()->id)->count();
    return view('dashboard', compact('exercice', 'totalSessions', 'totalExercices'));
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

    Route::get('/trainer/dashboard', [DashboardController::class, 'trainerdashboard'])->name('trainer.dashboard');
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

    Route::post('/append/exercice', [ExerciceController::class, 'append'])->name('append.exercice');

    Route::post('/exercice/completed', [ExerciceController::class, 'completed'])->name('exercice.completed');

    //* Member

        Route::get('/member/dashboard', [DashboardController::class, 'memberDashboard'])->name('member.dashboard');
        Route::get('/member/planing', [DashboardController::class, 'memberPlanning'])->name('member.planing');
        Route::post('/join/session', [TrainerSessionController::class, 'joinSession'])->name('session.join');
        Route::get('/session/start/{session}', [DashboardController::class, 'startSession'])->name('start.session');
        Route::get('/member/reservation', [DashboardController::class, 'reservations'])->name('member.reservation');

        Route::resource("reservation" , ReservationController::class);
        Route::put("/reservation/update/{reservation}" , [ReservationController::class , "update"])->name("updateReservation");
        Route::delete("/reservation/delete/{reservation}" , [ReservationController::class , "destroy"])->name("deleteReservation");


        Route::put('/exercice/favorite/{exercice}', [ExerciceController::class, 'favoriteExercice'])->name('exercice.favorite');

        Route::get('/favorite/exercices', [DashboardController::class, 'favorites'])->name('favorites');



});


Route::get('/get-fit', [LandingPageController::class, 'index'])->name('guest-app');



require __DIR__.'/auth.php';
