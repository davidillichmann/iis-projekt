<?php

namespace App\Repositories;

use App\ConcertItemInterface;
use Illuminate\Support\Facades\DB;

interface ConcertRepositoryInterface {

//    public function getAllItems();

    /**
     * @param int $id
     * @return ConcertItemInterface ConcertItem
     */
    public function getItemById(int $id): ConcertItemInterface;

    public function getAllItems();

    public function insertGetId(array $data, int $eventId);

//    public function save($eventid, $capacity, $date);
}