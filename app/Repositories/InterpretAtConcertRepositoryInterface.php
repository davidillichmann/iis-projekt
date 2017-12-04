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

//    public function getConcertItemsByInterpretId(int $interpretId);

    public function getItemsByIisConcertIdSortedByOrder(int $iisConcertId);

    public function insertGetId(array $data);

    public function deleteById(int $concertInterpretId);

    public function deleteByConcertId(int $concertId);

    public function deleteByInterpretId(int $interpretId);

}