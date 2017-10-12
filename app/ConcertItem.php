<?php

namespace App;


class ConcertItem {

    protected $iis_concertid;
    protected $iis_eventid;
    protected $capacity;
    protected $date;
    protected $created_at;
    protected $updated_at;

    /**
     * @return mixed
     */
    public function getUpdatedAt ()
    {
        return $this->updated_at;
    }

    /**
     * @return mixed
     */
    public function getIisEventid ()
    {
        return $this->iis_eventid;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt ()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getCapacity ()
    {
        return $this->capacity;
    }

    /**
     * @return mixed
     */
    public function getDate ()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getIisConcertid ()
    {
        return $this->iis_concertid;
    }

}