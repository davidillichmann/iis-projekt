<?php

namespace App\Repositories;

use App\ConcertItemInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use App\ConcertItem;

class ConcertRepository implements ConcertRepositoryInterface {

    protected $columns = [
        '`iis_concert`.`iis_concertid`',
        '`iis_concert`.`iis_eventid`',
        '`iis_concert`.`capacity`',
        '`iis_concert`.`date`',
        '`iis_concert`.`created_at`',
        '`iis_concert`.`updated_at`',
    ];

    /**
     * @return Builder
     */
    protected function getQueryBuilder()
    {
        return DB::table('iis_concert')
            ->select(DB::raw(implode(',', $this->columns)));
    }

    public function getAllItems()
    {
        return $this->_toItems($results = $this->getQueryBuilder()
            ->get());
    }

    private function _toItem($row)
    {
        if($row) {
            return new ConcertItem((array) $row);
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

    /**
     * @param int $id
     * @return ConcertItemInterface ConcertItem
     */
    public function getItemById(int $id): ConcertItemInterface
    {
        return $this->_toItem($this->getQueryBuilder()
            ->where('iis_concertid', $id)
            ->first());
    }

    public function insertGetId(array $data, int $eventId)
    {
        return DB::table('iis_concert')->insertGetId([
            'iis_eventid' => $eventId,
            'capacity' => $data['capacity'],
            'date' => $data['date'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

    public function updateById(array $data, $concertId)
    {
        return DB::table('iis_concert')
            ->where('iis_concertid', '=', $concertId)
            ->update([
                'capacity' => $data['capacity'],
                'date' => $data['date'],
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    }

    public function deleteById(int $concertId)
    {
        $this->getQueryBuilder()->
        where('iis_concertid', '=', $concertId)
            ->delete();
    }
}