<?php

if (! function_exists('iisConcertRepository')) {
    /**
     * @return \App\Repositories\ConcertRepositoryInterface
     */
    function iisConcertRepository()
    {
        static $repository = null;
        if (null === $repository) {
            $repository = app(\App\Repositories\ConcertRepositoryInterface::class);
        }
        return $repository;
    }
}

if (! function_exists('iisFestivalRepository')) {
    /**
     * @return \App\Repositories\FestivalRepositoryInterface
     */
    function iisFestivalRepository()
    {
        static $repository = null;
        if (null === $repository) {
            $repository = app(\App\Repositories\FestivalRepositoryInterface::class);
        }
        return $repository;
    }
}

if (! function_exists('iisEventRepository')) {
    /**
     * @return \App\Repositories\EventRepositoryInterface
     */
    function iisEventRepository()
    {
        static $repository = null;
        if (null === $repository) {
            $repository = app(\App\Repositories\EventRepositoryInterface::class);
        }
        return $repository;
    }
}

if (! function_exists('iisInterpretRepository')) {
    /**
     * @return \App\Repositories\InterpretRepositoryInterface
     */
    function iisInterpretRepository()
    {
        static $repository = null;
        if (null === $repository) {
            $repository = app(\App\Repositories\InterpretRepositoryInterface::class);
        }
        return $repository;
    }
}

if (! function_exists('iisInterpretAtConcertRepository')) {
    /**
     * @return \App\Repositories\InterpretAtConcertRepositoryInterface
     */
    function iisInterpretAtConcertRepository()
    {
        static $repository = null;
        if (null === $repository) {
            $repository = app(\App\Repositories\InterpretAtConcertRepositoryInterface::class);
        }
        return $repository;
    }
}

if (! function_exists('iisTicketTypeRepository')) {
    /**
     * @return \App\Repositories\TicketTypeRepositoryInterface
     */
    function iisTicketTypeRepository()
    {
        static $repository = null;
        if (null === $repository) {
            $repository = app(\App\Repositories\TicketTypeRepositoryInterface::class);
        }
        return $repository;
    }
}

if (! function_exists('iisStageRepository')) {
    /**
     * @return \App\Repositories\StageRepositoryInterface
     */
    function iisStageRepository()
    {
        static $repository = null;
        if (null === $repository) {
            $repository = app(\App\Repositories\StageRepositoryInterface::class);
        }
        return $repository;
    }
}

if (! function_exists('iisInterpretAtStageRepository')) {
    /**
     * @return \App\Repositories\InterpretAtStageRepositoryInterface
     */
    function iisInterpretAtStageRepository()
    {
        static $repository = null;
        if (null === $repository) {
            $repository = app(\App\Repositories\InterpretAtStageRepositoryInterface::class);
        }
        return $repository;
    }
}

