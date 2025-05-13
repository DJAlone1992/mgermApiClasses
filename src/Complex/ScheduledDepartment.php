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
        'indexing' => false,
        'id' => 1
    ];
    /**
     ** Включает индексацию по id врача
     * @var bool
     */
    private bool $indexing = false;
    /**
     ** Данные отделения
     * @var Department|null|null
     */
    private ?Department $department = null;
    /**
     ** Список врачей с расписанием
     * @var ScheduledDoctor[]|null|null
     */
    private ?array $doctors = null;

    /**
     * @param ScheduledDoctor $doctor
     *
     * @return static
     */
    public function appendDoctor(ScheduledDoctor $doctor): static
    {
        if (is_null($this->doctors)) {
            $this->doctors = [];
        }
        if ($this->indexing) {
            $this->doctors[$doctor->getId()] = $doctor;
        } else {
            $this->doctors[] = $doctor;
        }
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
    public function setDoctors(?array $doctors): static
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
    public function setDepartment(?Department $department): static
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

    public function getIndexing(): bool
    {
        return $this->indexing;
    }
    public function setIndexing(bool $indexing): static
    {
        $this->indexing = $indexing;

        return $this;
    }
}
