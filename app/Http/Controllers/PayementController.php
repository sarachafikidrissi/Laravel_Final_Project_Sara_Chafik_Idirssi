<?php

namespace App\Http\Controllers;

use App\Models\Payement;
use App\Models\TrainerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Event;
use Stripe\Exception\SignatureVerificationException;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Stripe\Webhook;

class PayementController extends Controller
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
    public function store(Request $request, $user_id)
    {
            // Store payment details in the database
            $payement = Payement::create([
                'user_id' => $user_id, 
                'status' => 'completed',
            ]);

            TrainerRequest::create([
                "user_id"=>$user_id,
                'status'=>'pending',
                'payement_id'=>$payement->id
            ]);
        $user = User::where('id', $user_id)->first();
        Auth::login($user);
        return redirect(route('dashboard', absolute: false));


    }
 

    /**
     * Display the specified resource.
     */
    public function show(Payement $payement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payement $payement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payement $payement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payement $payement)
    {
        //
    }
}
