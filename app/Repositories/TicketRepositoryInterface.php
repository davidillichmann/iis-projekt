<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

interface TicketRepositoryInterface {



//    public function getItemsByIisConcertIdSortedByOrder(int $iisConcertId);
//
//    public function insert(int $iis_ticket_typeid, int $iis_userid, $code);

    public function checkExistingTicketCode($code);

    public function insertGetId(array $data);

    public function getItemById(int $id);
//
//    public function deleteById(int $concertInterpretId);
//
//    public function deleteByConcertId(int $concertId);

}