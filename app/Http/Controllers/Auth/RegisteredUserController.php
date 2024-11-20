<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Stripe\Checkout\Session;
use Stripe\Price;
use Stripe\Stripe;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    public function trainer(): View
    {
        return view('auth.trainer');
    }

    public function nextStep(Request $request) {
        $user = $request->session()->get('user');
        return view('profile.memberNextStepRegister', compact('user')); //* can be updated later
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image'=>'required',
            'age'=>"required",
            'gender'=>'required|in:female,male'
        ]);
        // dd($request->all());

        $image = $request->image;

        $imageName = hash('sha256',  file_get_contents($image)) . '.' . $image->getClientOriginalExtension();

        $image->move(storage_path('app/public/images/profile'), $imageName);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender'=>$request->gender,
            'age'=>$request->age,
            'image'=>$imageName
        ]);
        
        $user->roles()->attach($request->role);
        $request->session()->put('user', $user);
        if($request->role == "3"){
            return redirect(route('next'));
        }else{
            return redirect(route('trainer.subscribe', ['user_id'=>$user->id])); //* can be updated later
        }
        
        


        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(route('dashboard', absolute: false));

    }


    public function storeMember(Request $request){
        $user = $request->session()->get('user');
        $request->validate([
                    "height"=>'required',
                    "weight"=>'required',
        ]);

        $weight = $request->weight;
        $height = $request->height;
        $activity_factor = $request->activity;

            // *        For men:
            //^ BMR = 10 × weight (kg) + 6.25 × height (cm) - 5 × age (years) + 5

            // *For women:
            //^ BMR = 10 × weight (kg) + 6.25 × height (cm) - 5 × age (years) - 161

            //! TDEE = BMR × Activity Factor

        if($user->gender === 'female'){
            $bmr = 10 * $weight + 6.25 * $height - 5 * $user->age + 5;
        }else{
            $bmr = 10 * $weight + 6.25 * $height - 5 * $user->age - 161;
        }
        
        $calories = $bmr * $activity_factor;

        $user->update([
            "weight"=>$request->weight,
            "height"=>$request->height,
            "calories"=>$calories
        ]);

        // dd('done');


        Auth::login($user);

        return redirect(route('dashboard', absolute: false)); //* can be updated later

    }

    public function trainerSubscription($user_id) {

        Stripe::setApiKey(config('stripe.sk'));
        $prices = Price::all();

        // dd($prices);
        $checkout_session = Session::create([
            'line_items' => [[
            'price' => $prices->data[0]->id,
            'quantity'=> 1

            ]],
            'mode' => 'subscription',
            'success_url' => route('stripe.subsribe',['user_id'=>$user_id]), 
            'cancel_url' => route('home'), //* can be updated later
          ]);

        return redirect()->away($checkout_session->url);
    }


    public function remove(Request $request, User $user) {
        $user->delete();
        return back();
    }


    
}
