<?php

namespace App\Repositories;

use App\InterpretAtConcertItem;
use Illuminate\Support\Facades\DB;

class InterpretAtConcertRepository extends InterpretRepository implements InterpretAtConcertRepositoryInterface {

    protected $columnsInterpretAtConcert = [
        '`iis_interpret_iis_concert`.`iis_interpret_iis_concertid`',
        '`iis_interpret_iis_concert`.`iis_interpretid`',
        '`iis_interpret_iis_concert`.`iis_concertid`',
        '`iis_interpret_iis_concert`.`order`',
        '`iis_interpret_iis_concert`.`date`',
        '`iis_interpret_iis_concert`.`created_at`',
        '`iis_interpret_iis_concert`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('iis_interpret_iis_concert')
            ->select(DB::raw(implode(',', $this->columnsInterpretAtConcert)));
    }

    public function getItemsByIisConcertIdSortedByOrder(int $iisConcertId)
    {
        $objects = $this->getQueryBuilder()
            ->select(DB::raw(implode(',', array_merge($this->columns, $this->columnsInterpretAtConcert))))
            ->where('iis_concertid', $iisConcertId)
            ->join('iis_interpret', 'iis_interpret_iis_concert.iis_interpretid', '=', 'iis_interpret.iis_interpretid')
            ->get();
        $arrays = [];
        foreach($objects as $object) {
            array_push($arrays, (array) $object);
        }
        usort($arrays, function ($a, $b) {
            return $a['order'] - $b['order'];
        });
        return $this->_toItems($arrays);
    }

//    public function getConcertItemsByInterpretId(int $interpretId)
//    {
//        $objects = $this->getQueryBuilder()
//            ->select(DB::raw(implode(',', array_merge($this->columns, $this->columnsInterpretAtConcert))))
//            ->where('iis_interpretid', $interpretId)
//            ->join('iis_concert', 'iis_interpret_iis_concert.iis_concertid', '=', 'iis_concert.iis_concertid')
//            ->get();
//        $arrays = [];
//        foreach($objects as $object) {
//            array_push($arrays, (array) $object);
//        }
//        return $this->_toItems($arrays);
//    }

    public function deleteById(int $concertInterpretId)
    {
        $this->getQueryBuilder()->
        where('iis_interpret_iis_concertid', '=', $concertInterpretId)
            ->delete();
    }

    public function deleteByInterpretId(int $interpretId)
    {
        $this->getQueryBuilder()->
        where('iis_interpretid', '=', $interpretId)
            ->delete();
    }

    public function deleteByConcertId(int $concertId)
    {
        $this->getQueryBuilder()->
        where('iis_concertid', '=', $concertId)
            ->delete();
    }

    public function insertGetId(array $data)
    {
        return DB::table('iis_interpret_iis_concert')->insertGetId([
            'iis_interpretid' => $data['interpretId'],
            'iis_concertid' => $data['concertId'],
            'order' => $data['order'],
            'date' => $data['date'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

//    public function getItemById($id)
//    {
//        return $this->_toItem($this->getQueryBuilder()
//            ->where('iis_interpretid', $id)
//            ->first());
//    }

    private function _toItem($row)
    {
        if($row) {
            return new InterpretAtConcertItem((array) $row);
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