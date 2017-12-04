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

//    public function getItemsByIisConcertIdSortedByOrder(int $iisConcertId)
//    {
//        $objects = $this->getQueryBuilder()
//            ->select(DB::raw(implode(',', array_merge($this->columns, $this->$columnsTicket))))
//            ->where('iis_concertid', $iisConcertId)
//            ->join('iis_interpret', 'iis_interpret_iis_concert.iis_interpretid', '=', 'iis_interpret.iis_interpretid')
//            ->get();
//        $arrays = [];
//        foreach($objects as $object) {
//            array_push($arrays, (array) $object);
//        }
//        usort($arrays, function ($a, $b) {
//            return $a['order'] - $b['order'];
//        });
//        return $this->_toItems($arrays);
//    }

//    public function deleteById(int $concertInterpretId)
//    {
//        $this->getQueryBuilder()->
//        where('iis_interpret_iis_concertid', '=', $concertInterpretId)
//            ->delete();
//    }
//
//    public function deleteByConcertId(int $concertId)
//    {
//        $this->getQueryBuilder()->
//        where('iis_concertid', '=', $concertId)
//            ->delete();
//    }
//
    public function insert(int $iis_ticket_typeid, int $iis_userid, $code)
    {
        return DB::table('iis_ticket')->insertGetId([
            'iis_userid' => $iis_userid,
            'iis_ticket_typeid' => $iis_ticket_typeid,
            'code' => $code,
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