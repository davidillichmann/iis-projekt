<?php

namespace App\Repositories;

use App\TicketTypeItemInterface;
use App\TicketTypeItem;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class TicketTypeRepository implements TicketTypeRepositoryInterface {

    protected $columns = [
        '`iis_ticket_type`.`iis_ticket_typeid`',
        '`iis_ticket_type`.`iis_eventid`',
        '`iis_ticket_type`.`type`',
        '`iis_ticket_type`.`price`',
        '`iis_ticket_type`.`created_at`',
        '`iis_ticket_type`.`updated_at`',
    ];

    /**
     * @return Builder
     */
    protected function getQueryBuilder()
    {
        return DB::table('iis_ticket_type')
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
            return new TicketTypeItem((array) $row);
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
     * @return TicketTypeItemInterface TicketTypeItem
     */
    public function getItemById(int $id): TicketTypeItemInterface
    {
        return $this->_toItem($this->getQueryBuilder()
            ->where('iis_ticket_typeid', $id)
            ->first());
    }

    public function insertGetId(array $data, int $eventId)
    {
        return DB::table('iis_ticket_type')->insertGetId([
            'iis_eventid' => $eventId,
            'type' => $data['type'],
            'price' => $data['price'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

    public function getItemsByIisEventIdSortedByPrice(int $eventId)
    {
        $objects = $this->getQueryBuilder()
            ->select(DB::raw(implode(',', array_merge($this->columns))))
            ->where('iis_eventid', $eventId)
            ->get();
        $arrays = [];
        foreach($objects as $object) {
            array_push($arrays, (array) $object);
        }
        usort($arrays, function ($a, $b) {
            return $a['price'] - $b['price'];
        });
        return $this->_toItems($arrays);
    }
}