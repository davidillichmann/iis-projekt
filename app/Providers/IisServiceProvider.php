<?php

namespace App\Providers;

use App\Repositories\ConcertRepository;
use App\Repositories\ConcertRepositoryInterface;
use App\Repositories\EventRepository;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\FestivalRepository;
use App\Repositories\FestivalRepositoryInterface;
use App\Repositories\InterpretAtConcertRepository;
use App\Repositories\InterpretAtConcertRepositoryInterface;
use App\Repositories\InterpretAtStageRepository;
use App\Repositories\InterpretAtStageRepositoryInterface;
use App\Repositories\InterpretRepository;
use App\Repositories\InterpretRepositoryInterface;
use App\Repositories\StageRepository;
use App\Repositories\StageRepositoryInterface;
use App\Repositories\TicketRepository;
use App\Repositories\TicketRepositoryInterface;
use App\Repositories\TicketTypeRepository;
use App\Repositories\TicketTypeRepositoryInterface;
use App\Repositories\UserInterpretRepository;
use App\Repositories\UserInterpretRepositoryInterface;
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
        $this->app->singleton(InterpretAtConcertRepositoryInterface::class, InterpretAtConcertRepository::class);
        $this->app->singleton(StageRepositoryInterface::class, StageRepository::class);
        $this->app->singleton(InterpretAtStageRepositoryInterface::class, InterpretAtStageRepository::class);
        $this->app->singleton(TicketTypeRepositoryInterface::class, TicketTypeRepository::class);
        $this->app->singleton(TicketRepositoryInterface::class, TicketRepository::class);
        $this->app->singleton(UserInterpretRepositoryInterface::class, UserInterpretRepository::class);
    }
}
