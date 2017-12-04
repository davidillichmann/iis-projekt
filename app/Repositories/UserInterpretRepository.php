<?php

namespace App\Repositories;

use App\UserInterpretItem;
use Illuminate\Support\Facades\DB;

class UserInterpretRepository implements UserInterpretRepositoryInterface {

    protected $columns = [
        '`iis_user_iis_interpret`.`iis_user_iis_interpretid`',
        '`iis_user_iis_interpret`.`iis_userid`',
        '`iis_user_iis_interpret`.`iis_interpretid`',
        '`iis_user_iis_interpret`.`created_at`',
        '`iis_user_iis_interpret`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('iis_user_iis_interpret')
            ->select(DB::raw(implode(',', $this->columns)));
    }

    private function _toItem($row)
    {
        if($row) {
            return new UserInterpretItem((array) $row);
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

    public function getItemByUserIdByInterpretId($userId, $interpretId)
    {
        return $this->_toItem($this->getQueryBuilder()
            ->where('iis_userid', $userId)
            ->where('iis_interpretid', $interpretId)
            ->first());
    }

    public function deleteByInterpretId($interpretId)
    {
        $this->getQueryBuilder()->
            where('iis_interpretid', '=', $interpretId)
            ->delete();
    }

    public function deleteByUserIdByInterpretId($userId, $interpretId)
    {
        $this->getQueryBuilder()->
            where('iis_userid', '=', $userId)
            ->where('iis_interpretid', '=', $interpretId)
            ->delete();
    }

    public function insertGetId(int $userId, int $interpretId)
    {
        return DB::table('iis_user_iis_interpret')->insertGetId([
            'iis_userid' => $userId,
            'iis_interpretid' => $interpretId,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}