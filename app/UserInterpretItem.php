<?php

namespace App;


class UserInterpretItem  {

    /**
     * @var int
     */
    protected $iis_user_iis_interpretid;
    /**
     * @var int
     */
    protected $iis_userid;
    /**
     * @var int
     */
    protected $iis_interpretid;
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
            $this->iis_user_iis_interpretid = $row['iis_user_iis_interpretid'];
            $this->iis_userid = $row['iis_userid'];
            $this->iis_interpretid = $row['iis_interpretid'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->iis_user_iis_interpretid;
    }

    /**
     * @return int
     */
    public function getIisUserid(): int
    {
        return $this->iis_userid;
    }

    /**
     * @return int
     */
    public function getIisInterpretid(): int
    {
        return $this->iis_interpretid;
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

}