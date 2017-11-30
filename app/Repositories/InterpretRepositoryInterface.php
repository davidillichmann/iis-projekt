<?php

namespace App\Repositories;

interface InterpretRepositoryInterface {

    public function getItemById($id);

    public function getAllItems();

    public function insertGetId(array $data);
}