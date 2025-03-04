<?php

namespace App\Providers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Paginator::defaultView('pagination::default');

        Gate::define('delete-question', function (User $user, Question $question) {
            return $question->user_id == $user->id;
        });

        Gate::define('edit-question', function (User $user, Question $question) {
            return $question->user_id == $user->id;
        });
    }
}
