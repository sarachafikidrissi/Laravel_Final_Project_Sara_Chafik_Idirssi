<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
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
        $reservations = Reservation::all();

        $colors = ["#fcc102", "#6C5F8D", "#4B3F6E", "#9C8CB9", "#BA96C1"]; // Array of colors

        $reservations = $reservations->map(function ($e, $index) use ($colors) {
            $name = User::where('id', $e->user_id)->first();
            return [
                "id" => $e->id,
                "start" => $e->start,
                "end" => $e->end,
                "owner" => $e->user_id,
                "color" => $colors[$index % count($colors)], // Assign colors cyclically
                "passed" => false,
                "title" => "Resrved by " . $name->name
            ];
        });

        return response()->json([
            "reservations" => $reservations
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "start" => "required",
            "end" => "required"
        ]);

        Reservation::create([
            "start" => $request->start . ":00",
            "end" => $request->end . ":00",
            "user_id" => Auth::user()->id
        ]);

        return back()->with("success", "Reservation has added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            "start" => "required",
            "end" => "required"
        ]);

        $reservation->update([
            "start" => $request->start,
            "end" => $request->end
        ]);

        return back()->with('success', 'Reservation has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return back()->with('success', 'Reservation has been deleted Successfuly');
    }
}
