<?php

namespace App\Providers;

use App\Models\Payement;
use App\Models\Role;
use App\Models\TrainerRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $trainerRole = Role::where("role", "trainer")->first();
        $memberRole = Role::where("role", "member")->first();
        $trainerRequests = User::where('trainersRequestStatus', 'pending')->get();
        
        $roleName = 'trainer';
        $member = 'member';

        $totalMembers = User::whereHas('roles', function ($query) use ($member) {
            $query->where('role', $member);
        })->count();



        $teams = User::whereHas('roles', function ($query) use ($roleName) {
            $query->where('role', $roleName);
        })->whereBetween('id', [2, 9])->get();

        $trainersTotal = User::whereHas('roles', function ($query) use ($roleName) {
            $query->where('role', $roleName);
        })->count();

        

        $totalRequests = User::where('trainersRequestStatus', 'pending')->count();
        $requests =  User::where('trainersRequestStatus', 'pending')->get();
        $totalSubscription = Payement::all()->count();

        $users = User::where('id' , '!=' , 1)->get();
        
        view()->share([
            "trainer" => $trainerRole,
            "member" => $memberRole,
            'trainerRequests' => $trainerRequests,
            "teams" => $teams,
            'totalMembers' => $totalMembers,
            'trainersTotal' =>  $trainersTotal,
            'totalRequests' => $totalRequests,
            'totalSubscription'=> $totalSubscription,
            'users'=>$users,
            'requests'=>$requests
        ]);

        Blade::directive('checkRole', function (string $role) {
            return "<?php if (Auth::check() && Auth::user()->hasRole($role)) : ?>";
        });

        Blade::directive('endCheckRole', function () {
            return "<?php endif ; ?>";
        });
    }
}
