<?php

namespace App\Repositories;

use App\EventItem;
use Illuminate\Support\Facades\DB;

class EventRepository implements EventRepositoryInterface {
    protected $columns = [
        '`iis_event`.`iis_eventid`',
        '`iis_event`.`name`',
        '`iis_event`.`location`',
        '`iis_event`.`image`',
        '`iis_event`.`description`',
        '`iis_event`.`created_at`',
        '`iis_event`.`updated_at`',
    ];

    protected function getQueryBuilder()
    {
        return DB::table('iis_event')
            ->select(DB::raw(implode(',', $this->columns)));
    }

//    public function getAllItems()
//    {
//        return $this->getQueryBuilder()
//            ->get();
//    }

    public function getItemById(int $id)
    {
        $row = $this->getQueryBuilder()
            ->where('iis_eventid', $id)
            ->first();
        if($row) {
            return new EventItem((array) $row);
        }
    }

//    public function save($name, $location, $image, $description)
//    {
//        return DB::table('`iis_event`')->insertGetId([
//            'name' => $name,
//            'location' => $location,
//            'image' => $image,
//            'description' => $description,
//            'created_at' => date("Y-m-d H:i:s"),
//            'updated_at' => date("Y-m-d H:i:s"),
//        ]);
//    }

}
