<?php

namespace MgermApiClasses\Complex;

use MgermApiClasses\Classes\Department;

class ScheduledDepartment{
    /**
     * @var Department|null|null
     */
    private ?Department $department=null;
    /**
     * @var ScheduledDoctor[]|null|null
     */
    private ?array $doctors = null;

/**
 * @param ScheduledDoctor $doctor
 *
 * @return static
 */
public function appendDoctor(ScheduledDoctor $doctor):static{
    if(is_null($this->doctors)){$this->doctors=[];}
    $this->doctors[]=$doctor;
    return $this;
}
    /**
     * @return ScheduledDoctor[]|null
     */
    public function getDoctors():?array
    {
        return $this->doctors;
    }


    /**
     * @param ScheduledDoctor[]|null $doctors
     *
     * @return static
     */
    public function setDoctors(?array $doctors):static
    {
        $this->doctors = $doctors;

        return $this;
    }


    /**
     * @return Department|null
     */
    public function getDepartment():?Department
    {
        return $this->department;
    }


    /**
     * @param Department|null $department
     *
     * @return static
     */
    public function setDepartment(?Department $department):static
    {
        $this->department = $department;

        return $this;
    }
}