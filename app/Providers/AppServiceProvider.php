<?php

namespace App\Providers;

use App\Models\Role;
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
        view()->share([
            "trainer" => $trainerRole,
            "member" => $memberRole
        ]);

        Blade::directive('checkRole', function (string $role) {
            return "<?php if (Auth::check() && Auth::user()->hasRole($role)) : ?>";
        });

        Blade::directive('endCheckRole', function () {
            return "<?php endif ; ?>";
        });
    }
}
