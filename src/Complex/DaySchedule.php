<?php

namespace MgermApiClasses\Complex;

use DateTime;
use MgermApiClasses\Base\BaseClass;

class DaySchedule extends BaseClass
{
    /**
     * @var DateTime|null|null
     */
    private $date;
    /**
     * @var ScheduledDepartment[]|null|null
     */
    private $departments;
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
    /**
     * @param ScheduledDepartment $department
     *
     * @return static
     */
    public function appendDepartment(ScheduledDepartment $department)
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
    public function setDepartments(?array $departments)
    {
        $this->departments = $departments;

        return $this;
    }

    /**
     * @return static
     */
    public static function createDummy()
    {
        $me = new static();
        $me->setDate('2002-02-02')->appendDepartment(ScheduledDepartment::createDummy());
        return $me;
    }
}
