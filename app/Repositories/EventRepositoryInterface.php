<?php
/**
 * Created by PhpStorm.
 * User: davidillichmann
 * Date: 12.10.17
 * Time: 19:37
 */

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

interface EventRepositoryInterface {

//    public function getAllItems();

//    public function getItemById(int $id);

    public function getRowById(int $id);

    public function insertGetId(array $data);

//    public function save($name, $location, $image, $description);
}