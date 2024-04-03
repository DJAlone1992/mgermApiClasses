<?php

namespace MgermApiClasses\Classes\Schedule;


use MgermApiClasses\Base\DateTimeStartTimeEndClass;

class Cell extends DateTimeStartTimeEndClass
{
    private bool $free = false;
    private ?bool $interval = false;

    public static function createDummy(): static
    {
        $me = new static();
        $me
            ->setDate('1999-09-09')
            ->setTimeStart('09:09')
            ->setTimeEnd('10:10')
            ->setFree(true)
            ->setInterval(true);
        return $me;
    }

    /**
     * @return bool
     */
    public function getFree(): bool
    {
        return boolval($this->free);
    }

    /**
     * @param bool $free
     *
     * @return static
     */
    public function setFree(bool $free): static
    {
        $this->free = $free;

        return $this;
    }


    /**
     * @return bool|null
     */
    public function getInterval(): ?bool
    {
        return $this->interval;
    }

    /**
     * @param bool $interval
     *
     * @return static
     */
    public function setInterval(bool $interval): static
    {
        $this->interval = $interval;

        return $this;
    }
}
