<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        $this->map();
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
    protected function map(): void
    {
        $this->mapDivisionRoute();
        $this->mapDistrictRoute();
        $this->mapApplicantRoute();
        $this->mapTodoRoute();
    }
    protected function mapDivisionRoute(): void
    {
        Route::prefix('division')
            ->name('division.')
            ->middleware(['web'])
            ->group(base_path('routes/divisionRoute.php'));
    }

    protected function mapApplicantRoute()
    {
        Route::prefix('applicant')
            ->name('applicants.')
            ->middleware(['web'])
            ->group(base_path('routes/applicantRoute.php'));
    }

    protected function mapDistrictRoute()
    {
        Route::prefix('district')
            ->name('district.')
            ->middleware(['web'])
            ->group(base_path('routes/districtRoute.php'));
    }
    protected function mapTodoRoute()
    {
        Route::prefix('todos')
            ->name('todo.')
            ->middleware(['web'])
            ->group(base_path('routes/todoRoute.php'));
    }
}
