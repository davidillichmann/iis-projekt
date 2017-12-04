<?php

namespace App\Repositories;

use App\UserInterpretItem;
use App\UserItem;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface {

    protected $columns = [
        '`iis_user`.`iis_userid`',
        '`iis_user`.`name`',
        '`iis_user`.`email`',
        '`iis_user`.`phone`',
        '`iis_user`.`role`',
        '`iis_user`.`created_at`',
        '`iis_user`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('iis_user')
            ->select(DB::raw(implode(',', $this->columns)));
    }

    private function _toItem($row)
    {
        if($row) {
            return new UserItem((array) $row);
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

    public function getItemById($userId)
    {
        return $this->_toItem($this->getQueryBuilder()
        ->where('iis_userid', '=', $userId)
        ->first());
    }

    public function getItemByEmail($email)
    {
        return $this->_toItem($this->getQueryBuilder()
            ->where('email', '=', $email)
            ->first());
    }

    public function updateRoleByUserId($role, $userId)
    {
        return DB::table('iis_user')
            ->where('iis_userid', '=', $userId)
            ->update([
                'role' => $role,
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    }

    public function updateById(array $data, $userId)
    {
        return DB::table('iis_user')
            ->where('iis_userid', '=', $userId)
            ->update([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
    }

    public function getAllItems()
    {
        return $this->_toItems($this->getQueryBuilder()->get());
    }

    public function deleteById($userId)
    {
        return $this->getQueryBuilder()->
            where('iis_userid', '=', $userId)
            ->delete();
    }

}