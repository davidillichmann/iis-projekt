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

    public function insertGetId(array $data, int $eventId)
    {
        return DB::table('iis_festival')->insertGetId([
            'iis_eventid' => $eventId,
            'interval' => $data['interval'],
            'order' => $data['order'],
            'start_date' => $data['start_date'],
            'end_date' => $data['end_date'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

    public function updateById(array $data, $festivalId)
    {
        return DB::table('iis_festival')
            ->where('iis_festivalid', '=', $festivalId)
            ->update([
                'interval' => $data['interval'],
                'order' => $data['order'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    }

    public function deleteById(int $festivalId)
    {
        $this->getQueryBuilder()->
        where('iis_festivalid', '=', $festivalId)
            ->delete();
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