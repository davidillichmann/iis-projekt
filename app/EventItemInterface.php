<?php

namespace App;

interface EventItemInterface {

    /**
     * @return mixed
     */
    public function getEventCreatedAt();

    /**
     * @return mixed
     */
    public function getIisEventid();

    /**
     * @return mixed
     */
    public function getLocation();

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return mixed
     */
    public function getEventUpdatedAt();
}