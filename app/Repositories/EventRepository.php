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

    public function getRowById(int $id): array
    {
        return (array) $this->getQueryBuilder()
            ->where('iis_eventid', $id)
            ->first();
    }

    public function insertGetId(array $data)
    {
        return DB::table('iis_event')->insertGetId([
            'name' => $data['name'],
            'location' => $data['location'],
            'image' => $data['imagePath'],
            'description' => $data['description'],
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }

    public function updateById(array $data, $eventId)
    {
        dd($data['image']);
        if(isset($data['image'])) {
            return DB::table('iis_event')
                ->where('iis_eventid', '=', $eventId)
                ->update([
                    'name' => $data['name'],
                    'location' => $data['location'],
                    'description' => $data['description'],
                    'image' => $data['image'],
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
        } else {
            return DB::table('iis_event')
                ->where('iis_eventid', '=', $eventId)
                ->update([
                    'name' => $data['name'],
                    'location' => $data['location'],
                    'description' => $data['description'],
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
        }
    }

    public function deleteById(int $eventId)
    {
        $this->getQueryBuilder()->
            where('iis_eventid', '=', $eventId)
            ->delete();
    }

    public function searchByRequest($request)
    {
        return $this->getQueryBuilder()->where('name','like', '%'.$request.'%')
            ->orwhere('location','like','%'.$request.'%')
            ->get();
    }

}
