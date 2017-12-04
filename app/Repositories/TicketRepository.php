<?php

namespace App\Repositories;

use App\TicketItem;
use Illuminate\Support\Facades\DB;

class TicketRepository extends TicketTypeRepository implements TicketRepositoryInterface {

    protected $columnsTicket = [
        '`iis_ticket`.`iis_ticketid`',
        '`iis_ticket`.`iis_userid`',
        '`iis_ticket`.`iis_ticket_typeid`',
        '`iis_ticket`.`code`',
        '`iis_ticket`.`created_at`',
        '`iis_ticket`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('iis_ticket')
            ->select(DB::raw(implode(',', $this->columnsTicket)));
    }

    public function insertGetId(array $data)
    {
        return DB::table('iis_ticket')->insertGetId([
            'iis_userid' => $data['userid'],
            'iis_ticket_typeid' => $data['ticketTypeId'],
            'code' => $data['code'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

//    public function getItemById(int $id)
//    {
//        return $this->_toItem($this->getQueryBuilder()
//            ->where('iis_ticketid', $id)
//            ->first());
//    }

    public function getItemsByUserId (int $userId)
    {
        $objects = $this->getQueryBuilder()
            ->select(DB::raw(implode(',', array_merge($this->columns, $this->columnsTicket))))
            ->where('iis_userid', $userId)
            ->join('iis_ticket_type', 'iis_ticket.iis_ticket_typeid', '=', 'iis_ticket_type.iis_ticket_typeid')
            ->get();
        $arrays = [];

        foreach($objects as $object) {
            array_push($arrays, (array) $object);
        }
        return $this->_toItems($arrays);
    }


    public function getItemById(int $id)
    {

        $object = $this->getQueryBuilder()
            ->select(DB::raw(implode(',', array_merge($this->columns, $this->columnsTicket))))
            ->where('iis_ticketid', $id)
            ->join('iis_ticket_type', 'iis_ticket.iis_ticket_typeid', '=', 'iis_ticket_type.iis_ticket_typeid')
            ->first();

        return $this->_toItem($object);
    }

    public function checkExistingTicketCode($code)
    {
        return $this->getQueryBuilder()
            ->where('code', $code)
            ->first() ? true : false;
    }

    private function _toItem($row)
    {
        if($row) {
            return new TicketItem((array) $row);
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