<?php

namespace App;

interface StageItemInterface {

    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getCreatedAt(): string;

    /**
     * @return string
     */
    public function getUpdatedAt(): string;
}