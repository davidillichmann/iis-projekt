<?php

namespace App;

interface ConcertItemInterface {

    /**
     * @return mixed
     */
    public function getUpdatedAt();

    /**
     * @return mixed
     */
    public function getIisEventid();

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @return mixed
     */
    public function getCapacity();

    /**
     * @return mixed
     */
    public function getDate();

    /**
     * @return mixed
     */
    public function getId();

    public function getEventItem();
}