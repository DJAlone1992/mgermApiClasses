<?php

namespace MgermApiClasses;

use DateTime;

/**
 * Класс направления из MGERM
 */
class Referral
{
    private ?int $id = null;
    private ?DateTime $referralDate = null;
    private ?DateTime $referralTimeStart = null;
    private ?DateTime $referralTimeEnd = null;
    private Patient $patient;
    private Doctor $doctor;
    private Department $department;
    private Hospital $hospital;

    public function __construct()
    {
        $this->patient = new Patient();
        $this->doctor = new Doctor();
        $this->department = new Department();
        $this->hospital = new Hospital();
    }
    public function getDepartment(): Department
    {
        return $this->department;
    }
    public function departmentFactory(int $id, string $name): static
    {
        $this->department->factory($id, $name);
        return $this;
    }
    public function setDepartment(Department $department): static
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
     * createFromMgermResponse
     * Создание экземпляра объекта из ответа MGERM
     * @param  array $data
     * @return static
     */
    public static function createFromMgermResponse($data): static
    {
        $referral = new static();
        $patient = Patient::createFromMgermResponse($data);
        $doctor = Doctor::createFromMgermResponse($data);
        $hospital = Hospital::createFromMgermResponse($data);

        $referral
            ->setId($data['referralRecordID'])
            ->setPatient($patient)
            ->setDoctor($doctor)
            ->setHospital($hospital)
            ->departmentFactory($data['departmentID'], $data['departmentName'])
            ->setReferralDate($data['referralDate'])
            ->setReferralTimeStart($data['referralTimeStart'])
            ->setReferralTimeEnd($data['referralTimeEnd']);

        return $referral;
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
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function _toArray($noIndents = false): array
    {
        $result = [];
        /** Данные пациента */
        if ($this->patient) {
            $result['patient'] = $this->patient->_toArray();
        }
        /** Данные направления */
        if ($this->referralDate) {
            $result['referralDate'] = $this->referralDate->format('Y-m-d');
        }
        if ($this->referralTimeStart) {
            $result['referralTimeStart'] = $this->referralTimeStart->format('H:i:s');
        }
        if ($this->referralTimeEnd) {
            $result['referralTimeEnd'] = $this->referralTimeEnd->format('H:i:s');
        }
        /** Данные подразделения */
        if ($this->department) {
            $result['department'] = $this->department->_toArray();
        }
        /** Данные врача */
        if ($this->doctor) {
            $result['doctor'] = $this->doctor->_toArray();
        }
        /** Данные клиники */
        if ($this->hospital) {
            $result['hospital'] = $this->hospital->_toArray();
        }
        return $result;
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
