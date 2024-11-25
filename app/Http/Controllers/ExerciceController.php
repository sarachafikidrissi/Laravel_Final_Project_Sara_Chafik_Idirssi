<?php

namespace App\Http\Controllers;

use App\Models\CompletedExercice;
use App\Models\Exercice;
use App\Models\TrainerSession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        
        $request->validate([
            "user_id"=>"required",
            "name"=>"required",
            "image"=>"required",
            "calories"=>"required"
        ]);
        
        // dd($request->all());
        $image = $request->image;

        $imageName = hash('sha256',  file_get_contents($image)) . '.' . $image->getClientOriginalExtension();

        $image->move(storage_path('app/public/images/exercices'), $imageName);

        Exercice::create([
            "user_id"=>$request->user_id,
            "name"=>$request->name,
            "image"=>$imageName,
            "calories"=>$request->calories
        ]);

        return back();


    }

    public function append(Request $request) {

        $exercice = Exercice::where('id', $request->exercice_id)->first();
        $session = TrainerSession::where('id', $request->trainer_session_id)->first();
        


        
        $exercice->trainerSessions()->attach($session);
        return back();

        
    }

    public function completed(Request $request){
        // dd($request->all());
        $user = Auth::user();
        $exercice = Exercice::where('id', $request->exercice_id)->first();
        $completed = CompletedExercice::create([
            "session_id"=>$request->session_id,
            "user_id"=>$user->id,
            "exercice_id"=>$request->exercice_id
        ]);
        if($request->completed == 0){
            // $exercice->completedUsers()->attach($user);
            $exercice->completedUsers()->detach();
            

        }
        // else{
        //     $exercice->completedUsers()->detach();
        // }
     
        return back();
    }

    public function favoriteExercice(Request $request, Exercice $exercice){


        $favoriteExercice = CompletedExercice::where('user_id', Auth::user()->id)->first();
        if($favoriteExercice->isFavorite == 0 ){
            
            $favoriteExercice->isFavorite = 1;
            
        }else{
            $favoriteExercice->isFavorite = 0;
        }
        $favoriteExercice->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercice $exercice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercice $exercice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercice $exercice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercice $exercice)
    {
        //
    }
}
