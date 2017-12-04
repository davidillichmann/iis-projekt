<?php

namespace App;

class TicketTypeItem  implements TicketTypeItemInterface {

    protected $iis_ticket_typeid;
    protected $iis_eventid;
    protected $type;
    protected $price;
    protected $created_at;
    protected $updated_at;

    public function __construct(array $row)
    {
        if (!is_null($row))
        {
//            dd($row);
            $this->iis_ticket_typeid = $row['iis_ticket_typeid'];
            $this->iis_eventid = $row['iis_eventid'];
            $this->type = $row['type'];
            $this->price = $row['price'];
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
    public function getIisTicketTypeid ()
    {
        return $this->iis_ticket_typeid;
    }

    /**
     * @return mixed
     */
    public function getPrice ()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getType ()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt ()
    {
        return $this->updated_at;
    }

//    public function getEventItem()
//    {
//        return iisEventRepository()->getItemById($this->getIisEventid());
//    }
}