<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\DateTimeStartTimeEndClass;

/**
 ** Класс направления из MGERM
 */
class Referral extends DateTimeStartTimeEndClass
{
    public const dummyArray = [
        'record'     => Record::dummyArray,
        'patient'    => Patient::dummyArray,
        'doctor'     => Doctor::dummyArray,
        'hospital'   => Hospital::dummyArray,
        'cabinet'    => Cabinet::dummyArray,
        'service'    => Service::dummyArray,
        'id'         => 1,
        'department' => Department::dummyArray,
        'date'       => '1999-09-09 00:00:00',
        'timeStart'  => '1999-09-09 09:09:00',
        'timeEnd'    => '1999-09-09 10:10:00',

    ];
    /**
     * @var Record|null
     */
    private ?Record $record = null;
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
        $this->patient    = new Patient();
        $this->doctor     = new Doctor();
        $this->department = new Department();
        $this->hospital   = new Hospital();
        $this->service    = new Service();
        $this->cabinet    = new Cabinet();
        $this->record     = new Record();
    }
    /**
     ** Отделение направления
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
    public function setDepartment(array | Department | null $department): static
    {
        $this->department = $department;
        return $this;
    }

    /**
     ** Врач в направлении
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
     ** Направленный пациент
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
     ** Запись направления
     * @return Record|null
     */
    public function getRecord(): ?Record
    {
        return $this->record;
    }

    /**
     * @param Record|null $record
     *
     * @return static
     */
    public function setRecord(?Record $record): static
    {
        $this->record = $record;

        return $this;
    }

    /**
     * createDummy
     * Создание экземпляра объекта с тестовым наполнением параметров
     * @return static
     */
    public static function createDummy(bool $imitateReal = false): static
    {
        $referral = new static();
        $patient  = Patient::createDummy($imitateReal);
        $doctor   = Doctor::createDummy($imitateReal);
        $hospital = Hospital::createDummy($imitateReal);
        $department = Department::createDummy($imitateReal);
        $record = Record::createDummy($imitateReal);
        $referral
            ->setRecord($record)
            ->setId(1)
            ->setPatient($patient)
            ->setDoctor($doctor)
            ->setHospital($hospital)
            ->setDepartment($department)
            ->setDate('1999-09-09')
            ->setTimeStart('09:09')
            ->setTimeEnd('10:10')
            ->setService(Service::createDummy($imitateReal))
            ->setCabinet(Cabinet::createDummy($imitateReal));
        return $referral;
    }

    /**
     ** Данные ЛПУ
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
     ** Услуга по направлению
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
     ** Кабинет в направлении
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
