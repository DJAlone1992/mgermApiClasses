<?php

namespace MgermApiClasses\Complex;

use DateTime;
use MgermApiClasses\Base\BaseClass;

class DaySchedule extends BaseClass
{
    /**
     * @var DateTime|null|null
     */
    private ?DateTime $date = null;
    /**
     * @var ScheduledDepartment[]|null|null
     */
    private ?array $departments = null;
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
    /**
     * @param ScheduledDepartment $department
     *
     * @return static
     */
    public function appendDepartment(ScheduledDepartment $department): static
    {
        if (is_null($this->departments)) {
            $this->departments = [];
        }
        $this->departments[] = $department;
        return $this;
    }
    /**
     * @return ScheduledDepartment[]|null
     */
    public function getDepartments(): ?array
    {
        return $this->departments;
    }


    /**
     * @param ScheduledDepartment[]|null $departments
     *
     * @return static
     */
    public function setDepartments(?array $departments): static
    {
        $this->departments = $departments;

        return $this;
    }

    public static function createDummy(bool $imitateReal = false): static
    {
        $me = new static();
        $me->setDate('2002-02-02')->appendDepartment(ScheduledDepartment::createDummy($imitateReal));
        return $me;
    }
}
