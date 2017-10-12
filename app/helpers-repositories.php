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