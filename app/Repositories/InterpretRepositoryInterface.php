<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

interface InterpretRepositoryInterface {

    public function getItemById($id);

    public function getAllItems();

    public function insertGetId(array $data);

    public function updateById(array $data, $interpretId);

    public function deleteById(int $interpretId);
}