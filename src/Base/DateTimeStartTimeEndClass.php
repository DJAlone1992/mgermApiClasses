<?php

namespace MgermApiClasses\Base;

use DateTime;

abstract class DateTimeStartTimeEndClass extends DateClass
{

    /**
     ** Дата и время начала
     *# |date('d.m.Y H:i')
     * @var DateTime|null|null
     */
    private $timeStart;
    /**
     ** Дата и время окончания
     *# |date('d.m.Y H:i')
     * @var DateTime|null|null
     */
    private $timeEnd;
    /**
     * @return DateTime|null
     */
    public function getTimeStart(): ?DateTime
    {
        return $this->timeStart;
    }

    /**
     * @param string|int|null|DateTime $timeStart
     *
     * @return static
     */
    public function setTimeStart($timeStart)
    {
        if (is_string($timeStart)) {
            $timeStart = new DateTime($this->getDate()->format('Y-m-d') . ' ' . $timeStart);
        }
        if (is_int($timeStart)) {
            $timeStart = new DateTime(date('Y-m-d', $timeStart));
        }
        $this->timeStart = $timeStart;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getTimeEnd(): ?DateTime
    {
        return $this->timeEnd;
    }

    /**
     * @param string|int|null|DateTime $timeEnd
     *
     * @return static
     */
    public function setTimeEnd($timeEnd)
    {
        if (is_string($timeEnd)) {
            $timeEnd = new DateTime($this->getDate()->format('Y-m-d') . ' ' . $timeEnd);
        }
        if (is_int($timeEnd)) {
            $timeEnd = new DateTime(date('Y-m-d', $timeEnd));
        }
        $this->timeEnd = $timeEnd;
        return $this;
    }
}
