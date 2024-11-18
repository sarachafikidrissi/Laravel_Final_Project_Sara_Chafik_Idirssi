<?php

namespace App\Http\Controllers;

use App\Models\TrainerRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TrainerRequestController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainerRequest $trainerRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainerRequest $trainerRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($user);
        $user->update([
            "trainersRequestStatus"=>"approved"
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainerRequest $trainerRequest)
    {
        //
    }
}
