<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\TrainerRequest;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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

        $teams = User::whereHas('roles', function ($query) use ($roleName) {
            $query->where('role', $roleName);
        })->whereBetween('id', [2, 9])->get();
        
        view()->share([
            "trainer" => $trainerRole,
            "member" => $memberRole,
            'trainerRequests' => $trainerRequests,
            "teams" => $teams
        ]);

        Blade::directive('checkRole', function (string $role) {
            return "<?php if (Auth::check() && Auth::user()->hasRole($role)) : ?>";
        });

        Blade::directive('endCheckRole', function () {
            return "<?php endif ; ?>";
        });
    }
}
