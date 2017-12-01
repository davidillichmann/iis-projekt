<?php
/**
 * Created by PhpStorm.
 * User: davidillichmann
 * Date: 01.12.17
 * Time: 0:19
 */

namespace App\Repositories;

interface StageRepositoryInterface {

    public function getItemsByFestivalId($festivalId);
}