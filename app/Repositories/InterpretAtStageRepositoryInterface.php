<?php

namespace App\Repositories;

interface InterpretAtStageRepositoryInterface {

    public function getItemsByIisStageIdSortedByDate(int $iisStageId);
}