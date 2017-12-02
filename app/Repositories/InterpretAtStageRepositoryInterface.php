<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

interface InterpretAtStageRepositoryInterface {

    public function getItemsByIisStageIdSortedByDate(int $iisStageId);

    public function insertGetId(array $data);

    public function deleteById(int $stageInterpretId);

    public function deleteByStageId(int $stageId);
}