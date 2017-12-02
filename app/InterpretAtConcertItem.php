<?php

namespace App;

/**
 * Class InterpretItem
 * @package App
 */
class InterpretAtConcertItem extends InterpretItem {

    /**
     * @var int
     */
    protected $iis_interpretid_iis_concertid;
    /**
     * @var int
     */
    protected $order;
    /**
     * @var string
     */
    protected $date;

    /**
     * InterpretItem constructor.
     * @param array $row
     */
    public function __construct(array $row)
    {
        if (!is_null($row))
        {
            parent::__construct($row);
            $this->iis_interpretid_iis_concertid = $row['iis_interpret_iis_concertid'];
            $this->order = $row['order'];
            $this->date = $row['date'];
        }
    }

    /**
     * @return int
     */
    public function getIisInterpretidIisConcertid(): int
    {
        return $this->iis_interpretid_iis_concertid;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

}