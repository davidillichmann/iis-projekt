<?php

namespace App\Repositories;

use App\InterpretAtStageItem;
use Illuminate\Support\Facades\DB;

class InterpretAtStageRepository extends InterpretRepository implements InterpretAtStageRepositoryInterface {

    protected $columnsInterpretAtStage = [
        '`iis_stage_iis_interpret`.`iis_stage_iis_interpretid`',
        '`iis_stage_iis_interpret`.`iis_stageid`',
        '`iis_stage_iis_interpret`.`iis_interpretid`',
        '`iis_stage_iis_interpret`.`date`',
        '`iis_stage_iis_interpret`.`created_at`',
        '`iis_stage_iis_interpret`.`updated_at`',
    ];

    public function getItemsByIisStageIdSortedByDate(int $iisStageId)
    {
        //TODO řazení - sort
        $objects = $this->getQueryBuilder()
            ->select(DB::raw(implode(',', array_merge($this->columns, $this->columnsInterpretAtStage))))
            ->where('iis_stageid', $iisStageId)
            ->join('iis_interpret', 'iis_stage_iis_interpret.iis_interpretid', '=', 'iis_interpret.iis_interpretid')
            ->get();
        $arrays = [];
        foreach ($objects as $object)
        {
            array_push($arrays, (array) $object);
        }
        usort($arrays, function ($a, $b)
        {
            return $a['date'] - $b['date'];
        });

        return $this->_toItems($arrays);
    }

    protected function getQueryBuilder()
    {
        return DB::table('iis_stage_iis_interpret')
            ->select(DB::raw(implode(',', $this->columnsInterpretAtStage)));
    }

    public function insertGetId(array $data)
    {
        return DB::table('iis_stage_iis_interpret')->insertGetId([
            'iis_stageid' => $data['stageId'],
            'iis_interpretid' => $data['interpretId'],
            'date' => $data['date'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

    public function deleteById(int $stageInterpretId)
    {
        $this->getQueryBuilder()->
            where('iis_stage_iis_interpretid', '=', $stageInterpretId)
            ->delete();
    }

    public function deleteByStageId(int $stageId)
    {
        $this->getQueryBuilder()->
        where('iis_stageid', '=', $stageId)
            ->delete();
    }

//    public function getItemById($id)
//    {
//        return $this->_toItem($this->getQueryBuilder()
//            ->where('iis_interpretid', $id)
//            ->first());
//    }

    private function _toItems($rows)
    {
        $items = [];
        foreach ($rows as $row)
        {
            $items[] = $this->_toItem((array) $row);
        }

        return $items;
    }

    private function _toItem($row)
    {
        if ($row)
        {
            return new InterpretAtStageItem((array) $row);
        }
    }
}