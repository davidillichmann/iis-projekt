<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

interface UserRepositoryInterface {

    public function getAllItems();

    public function deleteById($userId);

    public function getItemById($userId);

    public function updateRoleByUserId($role, $userId);

    public function updateById(array $data, $userId);

    public function getItemByEmail($email);
}