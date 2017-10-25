<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\FestivalItem;

class FestivalRepository implements FestivalRepositoryInterface {

    protected $columns = [
      '`iis_festival`.`iis_festivalid`',
      '`iis_festival`.`iis_eventid`',
      '`iis_festival`.`interval`',
      '`iis_festival`.`order`',
      '`iis_festival`.`start_date`',
      '`iis_festival`.`end_date`',
      '`iis_festival`.`created_at`',
      '`iis_festival`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('iis_festival')
            ->select(DB::raw(implode(',', $this->columns)));
    }

    public function getAllItems()
    {
        return $this->_toItems($results = $this->getQueryBuilder()
            ->get());
    }

    public function getItemById($id)
    {
        return $this->_toItem($this->getQueryBuilder()
            ->where('iis_festivalid', $id)
            ->first());
    }

    private function _toItem($row)
    {
        if($row) {
            return new FestivalItem((array) $row);
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

//    public function save($eventid, $frequency, $length)
//    {
//        return DB::table('`iis_event`')->insertGetId([
//            'eventid' => $eventid,
//            'frequency' => $frequency,
//            'length' => $length,
//            'created_at' => date("Y-m-d H:i:s"),
//            'updated_at' => date("Y-m-d H:i:s"),
//        ]);
//    }
}