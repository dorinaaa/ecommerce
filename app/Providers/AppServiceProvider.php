<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // This try catch is necessary for the Package Auto-discovery
        // otherwise it will throw an error because no database
        // connection has been made yet.
        try {
            if (Schema::hasTable('permissions')) {
                $permissions = Permission::all()->pluck('key')->toArray();
                foreach ($permissions as $gate) {
                    Gate::define($gate, function ($user) use ($gate) {
                        return $user->hasPermission($gate);
                    });
                }
            }
        } catch (\PDOException $e) {
            Log::error('No Database connection yet in AuthServiceProvider');
        }
        //usage : $this->can('browse_' . $siteKey)
    }
}
