<?php

namespace MgermApiClasses\Base;

use DateTime;

abstract class DateTimeStartTimeEndClass extends DateClass
{

    /**
     * @var DateTime|null|null
     */
    private ?DateTime $timeStart = null;
    /**
     * @var DateTime|null|null
     */
    private ?DateTime $timeEnd = null;
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
            $timeStart = new DateTime($timeStart);
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
            $timeEnd = new DateTime($timeEnd);
        }
        if (is_int($timeEnd)) {
            $timeEnd = new DateTime(date('Y-m-d', $timeEnd));
        }
        $this->timeEnd = $timeEnd;
        return $this;
    }
}
