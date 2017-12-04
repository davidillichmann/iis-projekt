<?php

namespace App;

class FestivalItem extends EventItem implements FestivalItemInterface {

    protected $iis_festivalid;
    protected $iis_eventid;
    protected $interval;
    protected $order;
    protected $start_date;
    protected $end_date;
    protected $created_at;
    protected $updated_at;

    public function __construct(array $row)
    {
        if (!is_null($row))
        {
            parent::__construct(iisEventRepository()->getRowById($row['iis_eventid']));
            $this->iis_festivalid = $row['iis_festivalid'];
            $this->iis_eventid = $row['iis_eventid'];
            $this->interval = $row['interval'];
            $this->order = $row['order'];
            $this->start_date = $row['start_date'];
            $this->end_date = $row['end_date'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
        }
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
    public function getIisEventid()
    {
        return $this->iis_eventid;
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
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function getStageItemsByFestivalId()
    {
        return iisStageRepository()->getItemsByFestivalId($this->getId());
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->iis_festivalid;
    }

    public function getTickets()
    {
        return iisTicketTypeRepository()->getItemsByIisEventIdSortedByPrice($this->iis_eventid);
    }
}
