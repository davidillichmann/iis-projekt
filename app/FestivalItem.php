<?php

namespace App;

class FestivalItem extends EventItem implements FestivalItemInterface {
    protected $iis_festivalid;
    protected $iis_eventid;
    protected $frequency;
    protected $length;
    protected $created_at;
    protected $updated_at;

    public function __construct(array $row)
    {
        if (!is_null($row)) {
            parent::__construct(iisEventRepository()->getRowById($row['iis_eventid']));
            $this->iis_festivalid = $row['iis_festivalid'];
            $this->iis_eventid = $row['iis_eventid'];
            $this->frequency = $row['frequency'];
            $this->length = $row['length'];
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
    public function getId ()
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
