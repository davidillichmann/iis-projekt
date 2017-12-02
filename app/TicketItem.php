<?php

namespace App;

class TicketItem extends TicketTypeItem {

    protected $iis_ticketid;
    protected $iis_userid;
    protected $code;
    protected $created_at;
    protected $updated_at;

    public function __construct(array $row)
    {
        if (!is_null($row))
        {
            parent::__construct($row);
            $this->iis_ticketid = $row['iis_ticketid'];
            $this->iis_userid = auth()->userid;
            $this->created_at = $row['created_at'];
            $this->created_at = $row['updated_at'];
        }
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
    public function getCreatedAt ()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getIisUserid ()
    {
        return $this->iis_userid;
    }

    /**
     * @return mixed
     */
    public function getCode ()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getIisTicketid ()
    {
        return $this->iis_ticketid;
    }

}