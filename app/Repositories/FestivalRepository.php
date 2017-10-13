<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\FestivalItem;

class FestivalRepository implements FestivalRepositoryInterface {

    protected $columns = [
      '`iis_festival`.`iis_festivalid`',
      '`iis_festival`.`iis_eventid`',
      '`iis_festival`.`frequency`',
      '`iis_festival`.`length`',
      '`iis_festival`.`created_at`',
      '`iis_festival`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('iis_festival')
            ->select(DB::raw(implode(',', $this->columns)));
    }

//    public function getAllItems()
//    {
//        return $this->getQueryBuilder()
//            ->get();
//    }

    public function getItemById($id)
    {
        $row = $this->getQueryBuilder()
            ->where('iis_festivalid', $id)
            ->first();
        if($row) {
            return new FestivalItem((array) $row);
        }
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