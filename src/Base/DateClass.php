<?php

namespace MgermApiClasses\Base;

use DateTime;

abstract class DateClass extends BaseClass
{
    /**
     ** Дата
     *# |date('d.m.Y')
     * @var DateTime|null|null
     */
    private ?DateTime $date = null;
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
    public function setDate(string|int|null|DateTime $date): static
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
