<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Idea;

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
        //Role
        Gate::define('admin', function(User $user):bool{
            return $user->is_admin;
        });

        //Permissions
        Gate::define('edit.idea', function(User $user, Idea $idea){
            return $user->id === $idea->user_id;
        });
        Gate::define('delete.idea', function(User $user, Idea $idea){
            return $user->id === $idea->user_id;
        });
        Paginator::useBootstrap();
    }
}
