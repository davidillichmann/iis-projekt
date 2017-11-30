<?php

namespace App\Repositories;

use App\InterpretItem;
use Illuminate\Support\Facades\DB;

class InterpretRepository implements InterpretRepositoryInterface {

    protected $columns = [
        '`iis_interpret`.`iis_interpretid`',
        '`iis_interpret`.`name`',
        '`iis_interpret`.`members`',
        '`iis_interpret`.`genre`',
        '`iis_interpret`.`publisher`',
        '`iis_interpret`.`image`',
        '`iis_interpret`.`description`',
        '`iis_interpret`.`formed_at`',
        '`iis_interpret`.`created_at`',
        '`iis_interpret`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('iis_interpret')
            ->select(DB::raw(implode(',', $this->columns)));
    }

//    public function getAllItems()
//    {
//        return $this->_toItems($results = $this->getQueryBuilder()
//            ->get());
//    }

    public function getItemById($id)
    {
        return $this->_toItem($this->getQueryBuilder()
            ->where('iis_interpretid', $id)
            ->first());
    }

    private function _toItem($row)
    {
        if($row) {
            return new InterpretItem((array) $row);
        }
    }

//    private function _toItems($rows)
//    {
//        $items = [];
//        foreach ($rows as $row) {
//            $items[] = $this->_toItem((array) $row);
//        }
//        return $items;
//    }
}