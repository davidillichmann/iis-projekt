<?php

namespace App\Repositories;

interface FestivalRepositoryInterface {

    public function getItemById($id);

    public function getAllItems();
}