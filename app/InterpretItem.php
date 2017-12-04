<?php

namespace App;

/**
 * Class InterpretItem
 * @package App
 */
class InterpretItem implements InterpretItemInterface {

    /**
     * @var mixed
     */
    protected $iis_interpretid;
    /**
     * @var mixed
     */
    protected $name;
    /**
     * @var mixed
     */
    protected $members;
    /**
     * @var mixed
     */
    protected $genre;
    /**
     * @var mixed
     */
    protected $publisher;
    /**
     * @var mixed
     */
    protected $image;
    /**
     * @var mixed
     */
    protected $formed_at;

    /**
     * @var mixed
     */
    protected $description;
    /**
     * @var mixed
     */
    protected $created_at;
    /**
     * @var
     */
    protected $updated_at;

    /**
     * InterpretItem constructor.
     * @param array $row
     */
    public function __construct(array $row)
    {
        if (!is_null($row))
        {
            $this->iis_interpretid = $row['iis_interpretid'];
            $this->name = $row['name'];
            $this->members = $row['members'];
            $this->genre = $row['genre'];
            $this->publisher = $row['publisher'];
            $this->image = $row['image'];
            $this->description = $row['description'];
            $this->formed_at = $row['formed_at'];
            $this->created_at = $row['created_at'];
            $this->updated_at = $row['updated_at'];
        }
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->iis_interpretid;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getFormedAt()
    {
        return $this->formed_at;
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
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @return bool
     */
    public function getUserInterpretBoolByInterpretId()
    {
        return iisUserInterpretRepository()->getItemByUserIdByInterpretId(auth()->id(), $this->getId())
            ? true
            : false;
    }

//    public function getConcertItemsByInterpretId()
//    {
//        return iisInterpretAtConcertRepository()->getConcertItemsByInterpretId($this->getId());
//    }
//
//    public function getInterpretAtStageItem()
//    {
////      TODO
//    }

}