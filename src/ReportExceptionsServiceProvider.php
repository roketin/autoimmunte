<?php
<<<<<<< HEAD
namespace Beykun\Immune;
=======
namespace Roketin\Immune;
>>>>>>> 14a9907ae7136f444f9ce8612756f13065202f37

use Illuminate\Support\ServiceProvider;

class ReportExceptionsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
<<<<<<< HEAD
            \Beykun\Immune\Commands\RoketinImmuneKey::class,
=======
            \Roketin\Immune\Commands\RoketinImmuneKey::class,
>>>>>>> 14a9907ae7136f444f9ce8612756f13065202f37
        ]);

        $this->publishes([
            __DIR__.'/config/lumenReportExceptions.php' => resource_path('lumenReportExceptions.php'),
        ], 'config');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/lumenReportExceptions.php',
            'lumenReportExceptions'
        );
    }
}
