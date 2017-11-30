<?php
/**
 * Created by PhpStorm.
 * User: davidillichmann
 * Date: 30.11.17
 * Time: 13:49
 */

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

interface InterpretAtConcertRepositoryInterface {

    public function getItemsByIisConcertIdSortedByOrder(int $iisConcertId);
}