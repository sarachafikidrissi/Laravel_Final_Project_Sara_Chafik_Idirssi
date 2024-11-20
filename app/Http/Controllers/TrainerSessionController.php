<?php

namespace App\Http\Controllers;

use App\Models\TrainerSession;
use Illuminate\Http\Request;

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
        //
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
    public function edit(TrainerSession $trainerSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainerSession $trainerSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainerSession $trainerSession)
    {
        //
    }
}
