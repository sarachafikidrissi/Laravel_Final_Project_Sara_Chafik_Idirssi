<?php

namespace App\Http\Controllers;

use App\Models\Exercice;
use App\Models\TrainerSession;
use App\Models\TrainerSessionExercice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function admindashboard()
    {

        return view('Gym.layouts.admin-dash');
    }

    public function trainerRequest()
    {
        return view('Gym.layouts.trainer-request');
    }

    public function showUsers()
    {
        return view('Gym.layouts.allUsers');
    }


    //* trainer


    public function trainerdashboard()
    {
        $totalSessions = TrainerSession::where('user_id', Auth::user()->id)->count();
        $totalExercices = Exercice::where('user_id', Auth::user()->id)->count();
        return view('Gym.layouts.trainer.trainer-dashboard', compact('totalSessions', 'totalExercices'));
    }

    public function trainerSessions()
    {
        $sessions = TrainerSession::where('user_id', Auth::user()->id)->get();
        return view('Gym.layouts.trainer.trainer-sessions', compact('sessions'));
    }

    public function trainerExercices()
    {
        $sessions = TrainerSession::where('user_id', Auth::user()->id)->get();
        $exercices = Exercice::where('user_id', Auth::user()->id)->get();

        return view('Gym.layouts.trainer.tariner-exercices', compact('exercices', 'sessions'));
    }

    public function sessionCalendar()
    {
        return view('Gym.layouts.trainer.trainer-calendar');
    }


    //* Member

    public function memberDashboard()
    {
        $exercice = Exercice::where('id', 1)->first();
        // to be used in displaying popluar trainers
        $mostRepetedUserInSessions = TrainerSession::select('user_id', DB::raw('COUNT(user_id) as count'))
            ->groupBy('user_id')
            ->orderBy('count', 'desc')
            ->get();




        return view('Gym.layouts.member.member-dahsboard', compact('exercice'));
    }

    public function memberPlanning()
    {
        $exercice = Exercice::where('id', 1)->first();

        return view('Gym.layouts.member.member-planing', compact('exercice'));
    }

    public function startSession(TrainerSession $session)
    {
        // $exercice = Exercice::where('id', 1)->first();
        $exercices = Exercice::all();
        $randomNumber = rand(5, 20);
        $isCompleted = false;
        foreach ($exercices as $exercice) {
            $exist = $exercice->completedUsers()->where('user_id', Auth::user()->id)->exists();
            if ($exist) {
                $isCompleted = true;
                break;
            }
        }
        // $isCompleted = $exercice->completedUsers()->where('user_id', Auth::user()->id)->exists();
        // dd($isCompleted);

        // Parse start and finish times as Carbon instances
        $start = Carbon::parse($session->start_time);
        $end = Carbon::parse($session->end_time);


        // Calculate the duration
        $durationInMinutes = $start->diffInMinutes($end);

        // Convert duration to hours and minutes
        $hours = intdiv($durationInMinutes, 60); // Get hours
        $minutes = $durationInMinutes % 60;     // Get remaining minutes


        $numberOfExercices = TrainerSessionExercice::where('trainer_session_id', $session->id)->count();
        $sessionTrainer = User::where('id', $session->user_id)->first()->name;
                        



        return view('Gym.layouts.member.start-session', compact('sessionTrainer','numberOfExercices', 'randomNumber', 'session', 'isCompleted', 'hours', 'minutes'));
    }
    public function reservations() {
        return view('Gym.layouts.member.member-reservation');
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
