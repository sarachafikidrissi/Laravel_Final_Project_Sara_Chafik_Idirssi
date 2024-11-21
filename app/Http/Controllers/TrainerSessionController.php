<?php

namespace App\Http\Controllers;

use App\Models\TrainerSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainerSessionController extends Controller
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
        $sessions = TrainerSession::all();

        $sessions = $sessions->map(function ($e) {
            return [
                "id" => $e->id,
                "start" => $e->start,
                "end" => $e->end,
                "owner"=> $e->user_id,
                'title'=>$e->name,
                "backgroundColor"=> '#ee7605e3', // Orange
                "borderColor"=> '#ee7605e3',
                "textColor"=> 'white'
            ];
        });

        return response()->json([
            "events" => $sessions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "user_id" => 'required',
            "name" => 'required',
            "description" => 'required',
            "start" => 'required',
            "end" => 'required',
            "status" => 'required',
            "image" => 'required',
            "spots" => 'required',
        ]);

        if($request->status == 'premium'){
            $request->validate([
                "price" => 'required'
            ]);
        }

        $image = $request->image;

        $imageName = hash('sha256',  file_get_contents($image)) . '.' . $image->getClientOriginalExtension();

        $image->move(storage_path('app/public/images/sessions'), $imageName);

        TrainerSession::create([
            "user_id" => $request->user_id,
            "name" => $request->name,
            "description" => $request->description,
            "start" => $request->start. ":00",
            "end" => $request->end. ":00",
            "status" => $request->status,
            "image" => $imageName,
            "spots" => $request->spots,
        ]);
        return back();
    

    }

    /**
     * Display the specified resource.
     */
    public function show(TrainerSession $trainerSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainerSession $session)
    {   
        return view('Gym.layouts.modals.update-session', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainerSession $session)
    {
        if($request->hasFile('image'))
        {
            if($request->status == 'premium'){
                $request->validate([
                    "status" => 'required'
                ]);
            }
            $path = storage_path("app/public/images/sessions/" . $session->image);
            if (file_exists($path)) {
                 unlink($path);
                 $request->image->move(storage_path("app/public/images/sessions"), $session->image);
            };

        }
        $session->update([
            "user_id" => $request->user_id,
            "name" => $request->name,
            "description" => $request->description,
            "start" => $request->start. ":00",
            "end" => $request->end. ":00",
            "status" => $request->status,
            "spots" => $request->spots,
        ]);
        return redirect()->intended(route('trainer.sessions'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainerSession $session)
    {

        $path = storage_path("app/public/images/sessions/" . $session->image);
        if (file_exists($path)) {
             unlink($path);
             $session->delete();
        };

        return redirect()->intended(route('trainer.sessions'));   
    }
}
