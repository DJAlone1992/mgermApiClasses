<?php

namespace MgermApiClasses\Complex;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Classes\Department;

class ScheduledDepartment extends BaseClass
{
    public const dummyArray =
    [
        'department' => Department::dummyArray,
        'doctors' => [
            0 => ScheduledDoctor::dummyArray,
        ],
        'id' => 1
    ];
    /**
     * @var Department|null|null
     */
    private $department;
    /**
     * @var ScheduledDoctor[]|null|null
     */
    private $doctors;

    /**
     * @param ScheduledDoctor $doctor
     *
     * @return static
     */
    public function appendDoctor(ScheduledDoctor $doctor)
    {
        if (is_null($this->doctors)) {
            $this->doctors = [];
        }
        $this->doctors[] = $doctor;
        return $this;
    }
    /**
     * @return ScheduledDoctor[]|null
     */
    public function getDoctors(): ?array
    {
        return $this->doctors;
    }


    /**
     * @param ScheduledDoctor[]|null $doctors
     *
     * @return static
     */
    public function setDoctors(?array $doctors)
    {
        $this->doctors = $doctors;

        return $this;
    }


    /**
     * @return Department|null
     */
    public function getDepartment(): ?Department
    {
        return $this->department;
    }


    /**
     * @param Department|null $department
     *
     * @return static
     */
    public function setDepartment(?Department $department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return static
     */
    public static function createDummy()
    {
        $me = new static();
        $me->setId(1)->setDepartment(Department::createDummy())->appendDoctor(ScheduledDoctor::createDummy());
        return $me;
    }
}
