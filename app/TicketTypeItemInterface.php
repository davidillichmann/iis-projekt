<?php

namespace App;

/**
 * Class TicketTypeItemInterface
 * @package App
 */
interface TicketTypeItemInterface {
    /**
     * @return mixed
     */
    public function getCreatedAt ();

    /**
     * @return mixed
     */
    public function getIisEventid ();

    /**
     * @return mixed
     */
    public function getIisTicketTypeid ();

    /**
     * @return mixed
     */
    public function getPrice ();

    /**
     * @return mixed
     */
    public function getType ();

    /**
     * @return mixed
     */
    public function getUpdatedAt ();
}