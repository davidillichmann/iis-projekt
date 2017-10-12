<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\ConcertItem;

class ConcertRepository {

    protected $columns = [
        '`iis_concert`.`concertid`',
        '`iis_concert`.`eventid`',
        '`iis_concert`.`capacity`',
        '`iis_concert`.`date`',
        '`iis_concert`.`created_at`',
        '`iis_concert`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('`iis_concert`')
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
            ->where('`concertid`', $id)
            ->get();
    }

    public function save($eventid, $capacity, $date)
    {
        return DB::table('`iis_concert`')->insertGetId([
            'eventid' => $eventid,
            'capacity' => $capacity,
            'date' => $date,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}