<?php

namespace App\Providers;

use App\Repositories\ConcertRepository;
use App\Repositories\ConcertRepositoryInterface;
use App\Repositories\EventRepository;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\FestivalRepository;
use App\Repositories\FestivalRepositoryInterface;
use App\Repositories\InterpretRepository;
use App\Repositories\InterpretRepositoryInterface;
use Illuminate\Support\ServiceProvider;

include __DIR__ . '/../helpers-repositories.php';

class IisServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLaravelSingeltons();
    }

    /**
     * Registrace repozitářů
     */
    protected function registerLaravelSingeltons()
    {
        $this->app->singleton(ConcertRepositoryInterface::class, ConcertRepository::class);
        $this->app->singleton(FestivalRepositoryInterface::class, FestivalRepository::class);
        $this->app->singleton(EventRepositoryInterface::class, EventRepository::class);
        $this->app->singleton(InterpretRepositoryInterface::class, InterpretRepository::class);
    }
}
