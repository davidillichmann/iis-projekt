<?php

namespace App;

/**
 * Class InterpretItem
 * @package App
 */
interface InterpretItemInterface {

    /**
     * @return mixed
     */
    public function getIisInterpretid();

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return mixed
     */
    public function getMembers();

    /**
     * @return mixed
     */
    public function getGenre();

    /**
     * @return mixed
     */
    public function getPublisher();

    /**
     * @return mixed
     */
    public function getImage();

    /**
     * @return mixed
     */
    public function getFormedAt();

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @return mixed
     */
    public function getUpdatedAt();
}