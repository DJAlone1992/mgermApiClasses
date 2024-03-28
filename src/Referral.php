<?php

namespace MgermApiClasses;

use DateTime;
use MgermApiClasses\Base\BaseClass;

/**
 * Класс направления из MGERM
 */
class Referral extends BaseClass
{
    /**
     * @var DateTime|null|null
     */
    private ?DateTime $referralDate = null;
    /**
     * @var DateTime|null|null
     */
    private ?DateTime $referralTimeStart = null;
    /**
     * @var DateTime|null|null
     */
    private ?DateTime $referralTimeEnd = null;
    /**
     * @var Patient
     */
    private Patient $patient;
    /**
     * @var Doctor
     */
    private Doctor $doctor;
    /**
     * @var Department
     */
    private Department $department;
    /**
     * @var Hospital
     */
    private Hospital $hospital;

    public function __construct()
    {
        $this->patient = new Patient();
        $this->doctor = new Doctor();
        $this->department = new Department();
        $this->hospital = new Hospital();
    }
    /**
     * getDepartment
     *
     * @return Department
     */
    public function getDepartment(): Department
    {
        return $this->department;
    }
    public function departmentFactory(int $id, string $name): static
    {
        $this->department->factory($id, $name);
        return $this;
    }
    /**
     * setDepartment
     *
     * @param  array|Department $department
     * @return self
     */
    public function setDepartment(array|Department $department): static
    {
        $this->department = $department;
        return $this;
    }

    /**
     * Get the value of doctor
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Set the value of doctor
     *
     * @return  self
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get the value of patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set the value of patient
     *
     * @return  self
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;

        return $this;
    }
    public function getReferralDate(): ?DateTime
    {
        return $this->referralDate;
    }

    public function setReferralDate(string|int|null|DateTime $referralDate): static
    {
        if (is_string($referralDate)) {
            $referralDate = new DateTime($referralDate);
        }
        if (is_int($referralDate)) {
            $referralDate = new DateTime(date('Y-m-d', $referralDate));
        }

        $this->referralDate = $referralDate;
        return $this;
    }

    public function getReferralTimeStart(): ?DateTime
    {
        return $this->referralTimeStart;
    }

    public function setReferralTimeStart(string|int|null|DateTime $referralTimeStart): static
    {
        if (is_string($referralTimeStart)) {
            $referralTimeStart = new DateTime($referralTimeStart);
        }
        if (is_int($referralTimeStart)) {
            $referralTimeStart = new DateTime(date('Y-m-d', $referralTimeStart));
        }
        $this->referralTimeStart = $referralTimeStart;
        return $this;
    }

    public function getReferralTimeEnd(): ?DateTime
    {
        return $this->referralTimeEnd;
    }

    public function setReferralTimeEnd(string|int|null|DateTime $referralTimeEnd): static
    {
        if (is_string($referralTimeEnd)) {
            $referralTimeEnd = new DateTime($referralTimeEnd);
        }
        if (is_int($referralTimeEnd)) {
            $referralTimeEnd = new DateTime(date('Y-m-d', $referralTimeEnd));
        }
        $this->referralTimeEnd = $referralTimeEnd;
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
            ->setReferralDate('1999-09-09')
            ->setReferralTimeStart('09:09')
            ->setReferralTimeEnd('10:10');

        return $referral;
    }

    /**
     * Get the value of hospital
     */
    public function getHospital()
    {
        return $this->hospital;
    }

    /**
     * Set the value of hospital
     *
     * @return  self
     */
    public function setHospital($hospital)
    {
        $this->hospital = $hospital;

        return $this;
    }
}
