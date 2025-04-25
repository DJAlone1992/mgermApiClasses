<?php

namespace MgermApiClasses\Classes\Schedule;


use MgermApiClasses\Base\DateTimeStartTimeEndClass;
use MgermApiClasses\Classes\Referral;

class Cell extends DateTimeStartTimeEndClass
{
    public const dummyArray =
    [
        'date' => '1999-09-09 00:00:00',
        'timeStart' => '1999-09-09 09:09:00',
        'timeEnd'   => '1999-09-09 10:10:00',
        'free' => true,
        'interval' => true,
        'referral' => null
    ];
    /**
     * @var bool
     */
    private $free = false;
    /**
     * @var bool|null
     */
    private $interval = false;
    /**
     * @var \MgermApiClasses\Classes\Referral|null
     */
    private $referral;

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
            ->setReferral(null)
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
    public function getReferral(): ?Referral
    {
        return $this->referral;
    }
    /**
     * @return static
     */
    public function setReferral($referral)
    {
        $this->referral = $referral;

        return $this;
    }
}
