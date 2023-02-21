<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Auth\AdminGuard;
use App\Auth\FacultyGuard;
use App\Auth\StudentGuard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::extend('admin', function ($app, $name, array $config) {
            $provider = Auth::createUserProvider($config['provider']);
            $guard = new AdminGuard($name, $provider, app()->make('session.store'));
            $guard->setCookieJar(app('cookie'));
            return $guard;
        });

        Auth::extend('faculty', function ($app, $name, array $config) {
            $provider = Auth::createUserProvider($config['provider']);
            $guard = new FacultyGuard($name, $provider, app()->make('session.store'));
            $guard->setCookieJar(app('cookie'));
            return $guard;
        });

        Auth::extend('student', function ($app, $name, array $config) {
            $provider = Auth::createUserProvider($config['provider']);
            $guard = new StudentGuard($name, $provider, app()->make('session.store'));
            $guard->setCookieJar(app('cookie'));
            return $guard;
        });
    }
}
