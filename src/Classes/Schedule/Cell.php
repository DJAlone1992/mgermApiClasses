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

    public const dummyArrayAll = [
        [
            //  'comment' => 'Свободная ячейка c периодом (комментарий не присутствует в реальной выдаче данных)',
            'date' => '1999-09-09 00:00:00',
            'timeStart' => '1999-09-09 09:09:00',
            'timeEnd'   => '1999-09-09 10:10:00',
            'free' => true,
            'interval' => true,
            'isReserved' => false,
            'isBlocked' => false,
            'isProlongation' => false,
            'isBreak' => false,

        ],
        [
            //  'comment' => 'Зарезервированная ячейка (комментарий не присутствует в реальной выдаче данных)',
            'date' => '1999-09-09 00:00:00',
            'timeStart' => '1999-09-09 09:09:00',
            'timeEnd'   => '1999-09-09 10:10:00',
            'free' => false,
            'interval' => true,
            'isReserved' => true,
            'isBlocked' => false,
            'isProlongation' => false,
            'isBreak' => false,

        ],
        [
            //      'comment' => 'Заблокированная ячейка (комментарий не присутствует в реальной выдаче данных)',
            'date' => '1999-09-09 00:00:00',
            'timeStart' => '1999-09-09 09:09:00',
            'timeEnd'   => '1999-09-09 10:10:00',
            'free' => false,
            'interval' => true,
            'isReserved' => false,
            'isBlocked' => true,
            'isProlongation' => false,
            'isBreak' => false,

        ],
        [
            //   'comment' => 'Ячейка перерыва (комментарий не присутствует в реальной выдаче данных)',
            'date' => '1999-09-09 00:00:00',
            'timeStart' => '1999-09-09 09:09:00',
            'timeEnd'   => '1999-09-09 10:10:00',
            'free' => false,
            'interval' => true,
            'isReserved' => false,
            'isBlocked' => false,
            'isProlongation' => false,
            'isBreak' => true,
        ],
        [
            //    'comment' => 'Ячейка продления (комментарий не присутствует в реальной выдаче данных)',
            'date' => '1999-09-09 00:00:00',
            'timeStart' => '1999-09-09 09:09:00',
            'timeEnd'   => '1999-09-09 10:10:00',
            'free' => false,
            'interval' => true,
            'isReserved' => false,
            'isBlocked' => false,
            'isProlongation' => true,
            'referralID' => 123,
            'isBreak' => false,
        ],
        [
            //  'comment' => 'Занятая ячейка (комментарий не присутствует в реальной выдаче данных)',
            'date' => '1999-09-09 00:00:00',
            'timeStart' => '1999-09-09 09:09:00',
            'timeEnd'   => '1999-09-09 10:10:00',
            'free' => false,
            'interval' => true,
            'isReserved' => false,
            'isBlocked' => false,
            'isProlongation' => false,
            'referral' => Referral::dummyArray,
            'isBreak' => false,
        ]
    ];
    /**
     ** Признак свободной ячейки
     * @var bool
     */
    private $free = false;
    /**
     ** Признак того, что ячейка является интервалом
     * @var bool|null
     */
    private $interval = false;
    /**
     ** Объект направления, занимающий ячейку
     * @var Referral|null|null
     */
    private $referral;
    /**
     ** Признак того, что ячейка зарезервирована. Запись невозможна
     * @var bool
     */
    private $isReserved = false;
    /**
     ** Признак того, что ячейка отмечена как "Нет приема".  Запись невозможна
     * @var bool
     */
    private $isBlocked = false;
    /**
     ** Признак того, что ячейка занята направлением, которое занимает более одной ячейки в расписании. Индекс данного направления находится в поле referralID
     * @var bool
     */
    private $isProlongation = false;
    /**
     ** Признак направления, которое занимает ячейку
     * @var int|null|null
     */
    private $referralID;
    /**
     ** Признак того, что ячейка отмечена как перерыв в работе врача.  Запись невозможна
     * @var bool
     */
    private $isBreak = false;

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

    public static function createDummyAll(bool $imitateReal = false): array
    {
        $result = [];
        $free = self::createDummy($imitateReal);
        $result[] = $free;

        $reserved = self::createDummy($imitateReal);
        $reserved
            ->setFree(false)
            ->setReserved();
        $result[] = $reserved;

        $blocked = self::createDummy($imitateReal);
        $blocked
            ->setFree(false)
            ->setBlocked();
        $result[] = $blocked;

        $break = self::createDummy($imitateReal);
        $break
            ->setFree(false)
            ->setBreak();
        $result[] = $break;

        $prolongation = self::createDummy($imitateReal);
        $prolongation
            ->setFree(false)
            ->setProlongation(123);
        $result[] = $prolongation;

        $notFree = self::createDummy($imitateReal);
        $notFree
            ->setFree(false)
            ->setReferral(Referral::createDummy($imitateReal));
        $result[] = $notFree;
        return $result;
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
