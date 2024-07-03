<?php

namespace MgermApiClasses\Base;

use DateTime;

abstract class DateClass extends BaseClass
{
    /**
     * @var DateTime|null|null
     */
    private $date;
    /**
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param string|int|null|DateTime $date
     *
     * @return static
     */
    public function setDate($date)
    {
        if (is_string($date)) {
            $date = new DateTime($date);
        }
        if (is_int($date)) {
            $date = new DateTime(date('Y-m-d', $date));
        }

        $this->date = $date;
        return $this;
    }
}
