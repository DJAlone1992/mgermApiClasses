<?php

namespace MgermApiClasses\Classes\Schedule;


use MgermApiClasses\Base\DateTimeStartTimeEndClass;

class Cell extends DateTimeStartTimeEndClass
{
    public const dummyArray =
    [
        'date' => '1999-09-09 00:00:00',
        'timeStart' => '1999-09-09 09:09:00',
        'timeEnd'   => '1999-09-09 10:10:00',
        'free' => true,
        'interval' => true
    ];
    private bool $free = false;
    private ?bool $interval = false;

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
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
    public function setFree(bool $free)
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
    public function setInterval(bool $interval)
    {
        $this->interval = $interval;

        return $this;
    }
}
