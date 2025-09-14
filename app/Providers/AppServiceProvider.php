<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


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
    Inertia::share([
        'authUser' => function () {
            $user = Auth::user();
            return $user ? [
                'id'    => $user->id,
                'name'  => $user->name,
                'roles' => $user->getRoleNames()->toArray(),
            ] : null;
        },
    ]);
}

}
