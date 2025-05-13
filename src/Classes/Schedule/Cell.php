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
        'isReserved' => false,
        'isBlocked' => false,
        'isProlongation' => false,
        'isBreak' => false,
    ];
    /**
     ** Признак свободной ячейки
     * @var bool
     */
    private bool $free = false;
    /**
     ** Признак того, что ячейка является интервалом
     * @var bool|null
     */
    private ?bool $interval = false;
    /**
     ** Объект направления, занимающий ячейку
     * @var Referral|null|null
     */
    private ?Referral $referral = null;
    /**
     ** Признак того, что ячейка зарезервирована. Запись невозможна
     * @var bool
     */
    private bool $isReserved = false;
    /**
     ** Признак того, что ячейка отмечена как "Нет приема".  Запись невозможна
     * @var bool
     */
    private bool $isBlocked = false;
    /**
     ** Признак того, что ячейка занята направлением, которое занимает более одной ячейки в расписании. Индекс данного направления находится в поле referralID
     * @var bool
     */
    private bool $isProlongation = false;
    /**
     ** Признак направления, которое занимает ячейку
     * @var int|null|null
     */
    private ?int $referralID = null;
    /**
     ** Признак того, что ячейка отмечена как перерыв в работе врача.  Запись невозможна
     * @var bool
     */
    private bool $isBreak = false;

    /**
     * @return static
     */
    public function setIsBreak(bool $isBreak)
    {
        $this->isBreak = $isBreak;
        return $this;
    }
    public function getIsBreak(): bool
    {
        return $this->isBreak;
    }

    /**
     * @return static
     */
    public function setBreak()
    {
        $this->isBreak = true;
        return $this;
    }

    /**
     * @return static
     */
    public function setReferralID(int $referralID)
    {
        $this->referralID = $referralID;
        return $this;
    }
    public function getReferralID(): ?int
    {
        return $this->referralID;
    }

    /**
     * @return static
     */
    public function setProlongation(?int $referralID = null)
    {
        if (!is_null($referralID)) {
            $this->setReferralID($referralID);
        }
        $this->isProlongation = true;
        return $this;
    }
    /**
     * @return static
     */
    public function setIsProlongation(?bool $isProlongation)
    {
        $this->isProlongation = $isProlongation;
        return $this;
    }

    public function getIsProlongation(): ?bool
    {
        return $this->isProlongation;
    }
    /**
     * @return static
     */
    public function setReserved(?int $referralID = null)
    {
        if (!is_null($referralID)) {
            $this->setReferralID($referralID);
        }
        $this->isReserved = true;
        return $this;
    }
    /**
     * @return static
     */
    public function setBlocked(?int $referralID = null)
    {
        if (!is_null($referralID)) {
            $this->setReferralID($referralID);
        }
        $this->isBlocked = true;
        return $this;
    }
    public function getIsReserved(): ?bool
    {
        return $this->isReserved;
    }

    /**
     * @return static
     */
    public function setIsReserved(?bool $isReserved)
    {
        $this->isReserved = $isReserved;
        return $this;
    }
    /**
     * @return static
     */
    public function setIsBlocked(?bool $isBlocked)
    {
        $this->isBlocked = $isBlocked;
        return $this;
    }
    public function getIsBlocked(): ?bool
    {
        return $this->isBlocked;
    }
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
    public function setReferral(?Referral $referral)
    {
        $this->referral = $referral;

        return $this;
    }
}
