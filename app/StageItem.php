<?php

namespace App;


class StageItem implements StageItemInterface {

    /**
     * @var int
     */
    protected $iis_stageid;
    /**
     * @var int
     */
    protected $iis_festivalid;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $created_at;
    /**
     * @var string
     */
    protected $updated_at;

    public function __construct(array $row)
    {
        if (!is_null($row))
        {
            $this->iis_stageid = $row['iis_stageid'];
            $this->iis_festivalid = $row['iis_festivalid'];
            $this->name = $row['name'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
        }
    }

    /**
     * @return int
     */
    public function getIisFestivalid(): int
    {
        return $this->iis_festivalid;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->iis_stageid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    public function getInterpretAtStageItems()
    {
        return iisInterpretAtStageRepository()->getItemsByIisStageIdSortedByDate($this->getId());
    }
}