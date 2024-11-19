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
     ** Данные отделения
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
     ** Список врачей
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

    public static function createDummy(bool $imitateReal = false): static
    {
        $me = new static();
        $me->setId(1)->setDepartment(Department::createDummy($imitateReal))->appendDoctor(ScheduledDoctor::createDummy($imitateReal));
        return $me;
    }
}
