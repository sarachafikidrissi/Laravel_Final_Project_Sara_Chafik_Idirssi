<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\TrainerSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    //* admin
    public function admindashboard() {

        return view('Gym.layouts.admin-dash');
    }
    
    public function trainerRequest(){
        return view('Gym.layouts.trainer-request');
    }
    
    public function showUsers() {
        return view('Gym.layouts.allUsers');
    }
    
    
    //* trainer
    
    
    public function trainerdashboard() {
        $totalSessions = TrainerSession::where('user_id', Auth::user()->id)->count();
        return view('Gym.layouts.trainer.trainer-dashboard', compact('totalSessions'));
    }
    
    public function trainerSessions() {
        $sessions = TrainerSession::where('user_id', Auth::user()->id)->get();
        return view('Gym.layouts.trainer.trainer-sessions', compact('sessions'));
    }

    public function trainerExercices() {

        $exercices = Exercice::where('user_id', Auth::user()->id)->get();

        return view('Gym.layouts.trainer.tariner-exercices', compact('exercices'));
    }

    public function sessionCalendar() {
        return view('Gym.layouts.trainer.trainer-calendar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
