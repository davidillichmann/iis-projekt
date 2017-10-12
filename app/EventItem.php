<?php

namespace App;

class EventItem
{
    protected $iis_eventid;
    protected $name;
    protected $location;
    protected $created_at;
    protected $updated_at;

    public function __construct(array $row)
    {
        if(! is_null($row)) {
            $this->iis_eventid = $row['iis_eventid'];
            $this->name = $row['name'];
            $this->location = $row['location'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
        }
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
    public function getIisEventid ()
    {
        return $this->iis_eventid;
    }

    /**
     * @return mixed
     */
    public function getLocation ()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getName ()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt ()
    {
        return $this->updated_at;
    }

}
