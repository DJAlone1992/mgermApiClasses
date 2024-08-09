<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\DateTimeStartTimeEndClass;

/**
 * Класс направления из MGERM
 */
class Referral extends DateTimeStartTimeEndClass
{
    public const dummyArray = [
        'patient' => Patient::dummyArray,
        'doctor' => Doctor::dummyArray,
        'hospital' => Hospital::dummyArray,
        'cabinet' => Cabinet::dummyArray,
        'service' => Service::dummyArray,
        'id' => 123456789,
        'department' => [
            'nameObj' => [
                'nominativeCase' => '[Отделение, куда направлен пациент]'
            ],
            'name' => '[Отделение, куда направлен пациент]',
            'id' => 1
        ],
        'date' => '1999-09-09 00:00:00',
        'timeStart' => '1999-09-09 09:09:00',
        'timeEnd'   => '1999-09-09 10:10:00',

    ];
    /**
     * @var Patient|null
     */
    private $patient;
    /**
     * @var Doctor|null
     */
    private $doctor;
    /**
     * @var Department|null
     */
    private $department;
    /**
     * @var Hospital|null
     */
    private $hospital;
    /**
     * @var Service|null
     */
    private $service;
    /**
     * @var Cabinet|null
     */
    private $cabinet;

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
    public function departmentFactory(?int $id, ?string $name)
    {
        $this->department->factory($id, $name);
        return $this;
    }

    /**
     * @param array|Department|null $department
     *
     * @return static
     */
    public function setDepartment($department)
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
    public function setDoctor(?Doctor $doctor)
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
    public function setPatient(?Patient $patient)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * createDummy
     * Создание экземпляра объекта с тестовым наполнением параметров
     * @return static
     */
    public static function createDummy()
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
            ->setTimeEnd('10:10')
            ->setService(Service::createDummy())
            ->setCabinet(Cabinet::createDummy());

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
    public function setHospital(?Hospital $hospital)
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
    public function setService(?Service $service)
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
    public function setCabinet(?Cabinet $cabinet)
    {
        $this->cabinet = $cabinet;

        return $this;
    }
}
