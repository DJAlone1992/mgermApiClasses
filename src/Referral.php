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
     * @return DateTime|null
     */
    public function getReferralDate(): ?DateTime
    {
        return $this->referralDate;
    }

    /**
     * @param string|int|null|DateTime $referralDate
     *
     * @return static
     */
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

    /**
     * @return DateTime|null
     */
    public function getReferralTimeStart(): ?DateTime
    {
        return $this->referralTimeStart;
    }

    /**
     * @param string|int|null|DateTime $referralTimeStart
     *
     * @return static
     */
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

    /**
     * @return DateTime|null
     */
    public function getReferralTimeEnd(): ?DateTime
    {
        return $this->referralTimeEnd;
    }

    /**
     * @param string|int|null|DateTime $referralTimeEnd
     *
     * @return static
     */
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
}
