<?php

namespace App;

class ConcertItem extends EventItem implements ConcertItemInterface {

    protected $iis_concertid;
    protected $iis_eventid;
    protected $capacity;
    protected $date;
    protected $created_at;
    protected $updated_at;

    public function __construct(array $row)
    {
        if (!is_null($row)) {
            parent::__construct(iisEventRepository()->getRowById($row['iis_eventid']));
            $this->iis_concertid = $row['iis_concertid'];
            $this->iis_eventid = $row['iis_eventid'];
            $this->capacity = $row['capacity'];
            $this->date = $row['date'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
        }
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return mixed
     */
    public function getIisEventid()
    {
        return $this->iis_eventid;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->iis_concertid;
    }

    public function getEventItem()
    {
        return iisEventRepository()->getItemById($this->getIisEventid());
    }

    public function getInterprets()
    {
        return iisInterpretAtConcertRepository()->getItemsByIisConcertIdSortedByOrder($this->iis_concertid);
    }

}