<?php

namespace App;

class EventItem implements EventItemInterface {
    protected $iis_eventid;
    protected $name;
    protected $location;
    protected $image;
    protected $description;
    protected $eventCreated_at;
    protected $eventUpdated_at;

    public function __construct(array $row)
    {
        if(! is_null($row)) {
            $this->iis_eventid = $row['iis_eventid'];
            $this->name = $row['name'];
            $this->location = $row['location'];
            $this->image = $row['image'];
            $this->description = $row['description'];
            $this->eventCreated_at = $row['created_at'];
            $this->eventUpdated_at = $row['updated_at'];
        }
    }

    /**
     * @return mixed
     */
    public function getEventCreatedAt ()
    {
        return $this->eventCreated_at;
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
    public function getImage ()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getDescription ()
    {
        return $this->description;
    }
    /**
     * @return mixed
     */
    public function getEventUpdatedAt ()
    {
        return $this->eventUpdated_at;
    }

}
