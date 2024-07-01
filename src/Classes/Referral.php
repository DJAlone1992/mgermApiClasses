<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\DateTimeStartTimeEndClass;

/**
 * Класс направления из MGERM
 */
class Referral extends DateTimeStartTimeEndClass
{
    /**
     * @var Patient|null
     */
    private ?Patient $patient;
    /**
     * @var Doctor|null
     */
    private ?Doctor $doctor;
    /**
     * @var Department|null
     */
    private ?Department $department;
    /**
     * @var Hospital|null
     */
    private ?Hospital $hospital;
    /**
     * @var Service|null
     */
    private ?Service $service;
    /**
     * @var Cabinet|null
     */
    private ?Cabinet $cabinet;

    public function __construct()
    {
        $this->patient = new Patient();
        $this->doctor = new Doctor();
        $this->department = new Department();
        $this->hospital = new Hospital();
        $this->service = new Service();
        $this->cabinet = new Cabinet();
    }
    /**
     * getDepartment
     *
     * @return Department|null
     */
    public function getDepartment(): ?Department
    {
        return $this->department;
    }
    /**
     * @param int|null $id
     * @param string|null $name
     *
     * @return static
     */
    public function departmentFactory(?int $id, ?string $name): static
    {
        $this->department->factory($id, $name);
        return $this;
    }

    /**
     * @param array|Department|null $department
     *
     * @return static
     */
    public function setDepartment(array|Department|null $department): static
    {
        $this->department = $department;
        return $this;
    }


    /**
     * @return Doctor|null
     */
    public function getDoctor(): ?Doctor
    {
        return $this->doctor;
    }


    /**
     * @param Doctor|null $doctor
     *
     * @return static
     */
    public function setDoctor(?Doctor $doctor): static
    {
        $this->doctor = $doctor;

        return $this;
    }


    /**
     * @return Patient|null
     */
    public function getPatient(): ?Patient
    {
        return $this->patient;
    }


    /**
     * @param Patient|null $patient
     *
     * @return static
     */
    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * createDummy
     * Создание экземпляра объекта с тестовым наполнением параметров
     * @return static
     */
    public static function createDummy(): static
    {
        $referral = new static();
        $patient = Patient::createDummy();
        $doctor = Doctor::createDummy();
        $hospital = Hospital::createDummy();
        $referral
            ->setId(123456789)
            ->setPatient($patient)
            ->setDoctor($doctor)
            ->setHospital($hospital)
            ->departmentFactory(1, '[Отделение, куда направлен пациент]')
            ->setDate('1999-09-09')
            ->setTimeStart('09:09')
            ->setTimeEnd('10:10');

        return $referral;
    }


    /**
     * @return Hospital|null
     */
    public function getHospital(): ?Hospital
    {
        return $this->hospital;
    }


    /**
     * @param Hospital|null $hospital
     *
     * @return static
     */
    public function setHospital(?Hospital $hospital): static
    {
        $this->hospital = $hospital;

        return $this;
    }

    /**
     * Получение услуги по направлению
     * @return Service|null
     */
    public function getService(): ?Service
    {
        return $this->service;
    }
    /**
     * Установка услуги по направлению
     * @param Service|null $service
     *
     * @return static
     */
    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }
    /**
     * @return Cabinet|null
     */
    public function getCabinet(): ?Cabinet
    {
        return $this->cabinet;
    }


    /**
     * @param Cabinet|null $cabinet
     *
     * @return static
     */
    public function setCabinet(?Cabinet $cabinet): static
    {
        $this->cabinet = $cabinet;

        return $this;
    }
}
