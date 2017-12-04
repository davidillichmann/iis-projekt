<?php

namespace App\Repositories;

use App\TicketTypeItemInterface;
use Illuminate\Support\Facades\DB;

interface TicketTypeRepositoryInterface {

    /**
     * @param int $id
     * @return TicketTypeItemInterface TicketTypeItem
     */
    public function getItemById(int $id): TicketTypeItemInterface;

    public function getAllItems();

    public function insertGetId(array $data, int $eventId);

    public function getItemsByIisEventIdSortedByPrice(int $eventId);

    public function deleteItemById(int $ticketTypeId);

    public function updateById (array $data, $ticketTypeId);

//    public function save($eventid, $capacity, $date);
}