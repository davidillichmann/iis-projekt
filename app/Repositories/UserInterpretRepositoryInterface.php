<?php

namespace App\Repositories;

interface UserInterpretRepositoryInterface {

    public function getItemByUserIdByInterpretId($userId, $interpretId);

    public function insertGetId(int $userId, int $interpretId);

    public function deleteByUserIdByInterpretId($userId, $interpretId);

    public function deleteByInterpretId($interpretId);
}