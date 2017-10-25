<?php

namespace App;

interface FestivalItemInterface {

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @return mixed
     */
    public function getIisEventid();

    /**
     * @return mixed
     */
    public function getUpdatedAt();

    /**
     * @return mixed
     */
    public function getInterval();

    /**
     * @return mixed
     */
    public function getId();

}