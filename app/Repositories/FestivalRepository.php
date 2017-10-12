<?php

namespace App\Repositories;


class FestivalRepository {

    protected $columns = [
      '`iis_festival`.`festivalid`',
      '`iis_festival`.`eventid`',
      '`iis_festival`.`frequency`',
      '`iis_festival`.`length`',
      '`iis_festival`.`created_at`',
      '`iis_festival`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('`iis_festival`')
            ->select(implode(',', $this->columns));
    }

    public function getAllItems()
    {
        return $this->getQueryBuilder()
            ->get();
    }

    public function getItemById($id)
    {
        return $this->getQueryBuilder()
            ->where('`iis_festivalid`', $id)
            ->get();
    }

    public function save($eventid, $frequency, $length)
    {
        return DB::table('`iis_event`')->insertGetId([
            'eventid' => $eventid,
            'frequency' => $frequency,
            'length' => $length,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}