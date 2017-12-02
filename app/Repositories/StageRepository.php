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

    public function getItemById($stageId)
    {
        return $this->_toItem($this->getQueryBuilder()
            ->where('iis_stageid', '=', $stageId)
            ->first());
    }

    public function getItemsByFestivalId($festivalId)
    {
        return $this->_toItems($this->getQueryBuilder()
            ->where('iis_stage.iis_festivalid', $festivalId)
            ->get());
    }

    public function insertGetId(array $data)
    {
        return DB::table('iis_stage')->insertGetId([
            'name' => $data['name'],
            'iis_festivalid' => $data['festivalId'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

    public function updateById(array $data, $stageId)
    {
        return DB::table('iis_stage')
            ->where('iis_stageid', '=', $stageId)
            ->update([
            'name' => $data['name'],
            'iis_festivalid' => $data['festivalId'],
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

    public function deleteById(int $stageId)
    {
        $this->getQueryBuilder()->
        where('iis_stageid', '=', $stageId)
            ->delete();
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