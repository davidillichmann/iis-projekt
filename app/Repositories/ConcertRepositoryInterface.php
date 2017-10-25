<?php

namespace App\Repositories;

use App\ConcertItemInterface;

interface ConcertRepositoryInterface {

//    public function getAllItems();

    /**
     * @param int $id
     * @return ConcertItemInterface ConcertItem
     */
    public function getItemById(int $id): ConcertItemInterface;

    public function getAllItems();

//    public function save($eventid, $capacity, $date);
}