<?php

namespace App;

/**
 * Class InterpretAtStageItem
 * @package App
 */
class InterpretAtStageItem extends InterpretItem {

    /**
     * @var int
     */
    protected $iis_stage_iis_interpretid;
    /**
     * @var int
     */
    protected $iis_stageid;
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
            $this->iis_stage_iis_interpretid = $row['iis_stage_iis_interpretid'];
            $this->iis_stageid = $row['iis_stageid'];
            $this->date = $row['date'];
        }
    }

    /**
     * @return int
     */
    public function getIisStageIisInterpretid(): int
    {
        return $this->iis_stage_iis_interpretid;
    }

    /**
     * @return int
     */
    public function getIisStageid(): int
    {
        return $this->iis_stageid;
    }


    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

}