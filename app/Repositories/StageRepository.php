<?php

namespace App\Repositories;


use App\StageItem;
use Illuminate\Support\Facades\DB;

class StageRepository implements StageRepositoryInterface {

    protected $columns = [
        '`iis_stage`.`iis_stageid`',
        '`iis_stage`.`name`',
        '`iis_stage`.`iis_festivalid`',
        '`iis_stage`.`created_at`',
        '`iis_stage`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('iis_stage')
            ->select(DB::raw(implode(',', $this->columns)));
    }

    public function getItemsByFestivalId($festivalId)
    {
        return $this->_toItems($this->getQueryBuilder()
            ->where('iis_stage.iis_festivalid', $festivalId)
            ->get());
    }

    private function _toItem($row)
    {
        if($row) {
            return new StageItem((array) $row);
        }
    }

    private function _toItems($rows)
    {
        $items = [];
        foreach ($rows as $row) {
            $items[] = $this->_toItem((array) $row);
        }
        return $items;
    }
}