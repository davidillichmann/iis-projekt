<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

interface FestivalRepositoryInterface {

    public function getItemById($id);

    public function getAllItems();

    public function insertGetId(array $data, int $eventId);

    public function updateById(array $data, $festivalId);

    public function deleteById(int $festivalId);
}