<?php
/**
 * Created by PhpStorm.
 * User: davidillichmann
 * Date: 01.12.17
 * Time: 0:19
 */

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

interface StageRepositoryInterface {

    public function getItemsByFestivalId($festivalId);

    public function insertGetId(array $data);

    public function getItemById($stageId);

    public function deleteById(int $stageId);

    public function updateById(array $data, $stageId);

    public function deleteByFestivalId(int $festivalId);
}