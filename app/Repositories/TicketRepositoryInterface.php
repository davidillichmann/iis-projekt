<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

interface TicketRepositoryInterface {

    public function checkExistingTicketCode($code);

    public function insertGetId(array $data);

    public function getItemById(int $id);

    public function getItemsByUserId (int $userId);
}