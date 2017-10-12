<?php

namespace App;

class FestivalItem
{
    protected $iis_festivalid;
    protected $iis_eventid;
    protected $frequency;
    protected $length;
    protected $created_at;
    protected $updated_at;

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
    public function getIisEventid ()
    {
        return $this->iis_eventid;
    }

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
    public function getFrequency ()
    {
        return $this->frequency;
    }

    /**
     * @return mixed
     */
    public function getIisFestivalid ()
    {
        return $this->iis_festivalid;
    }

    /**
     * @return mixed
     */
    public function getLength ()
    {
        return $this->length;
    }
}
