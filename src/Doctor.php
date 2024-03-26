<?php

namespace MgermApiClasses;

/**
 * Класс врача из MGERM
 */
class Doctor extends Person
{
    private Specialty $specialty;
    private Department $department;

    public function __construct()
    {
        $this->specialty = new Specialty();
        $this->department = new Department();
    }
    public function setSpecialty(Specialty $specialty): static
    {
        $this->specialty = $specialty;
        return $this;
    }
    public function setDepartment(Department $department): static
    {
        $this->department = $department;
        return $this;
    }
    public function specialtyFactory(int $id, string $name): static
    {
        $this->specialty->factory($id, $name);
        return $this;
    }
    public function departmentFactory(int $id, string $name): static
    {
        $this->department->factory($id, $name);
        return $this;
    }

    /**
     * Get the value of specialty
     */
    public function getSpecialty(): Specialty
    {
        return $this->specialty;
    }

    /**
     * Get the value of department
     */
    public function getDepartment(): Department
    {
        return $this->department;
    }

    /**
     * createFromMgermResponse
     * Создание экземпляра объекта из ответа MGERM
     * @param  array $data
     * @return static
     */
    public static function createFromMgermResponse($data): static
    {
        $doctor = new static();
        $doctor
            ->specialtyFactory($data['doctorSpecialtyID'], $data['doctorSpecialtyName'])
            ->setLastName($data['doctorLastName'])
            ->setId($data['doctorID'])
            ->setFirstName($data['doctorFirstName']);

        if (isset($data['doctorDepartmentID'])) {
            $doctor->getDepartment()->setId($data['doctorDepartmentID']);
        }
        if (isset($data['doctorDepartmentName'])) {
            $doctor->getDepartment()->setName($data['doctorDepartmentName']);
        }
        if (isset($data['doctorSecondName'])) {
            $doctor->setSecondName($data['doctorSecondName']);
        }
        if (isset($data['doctorBirthday'])) {
            $doctor->setBirthDay($data['doctorBirthday']);
        }
        if (isset($data['doctorSex'])) {
            $doctor->setSex($data['doctorSex']);
        }
        return $doctor;
    }
    /**
     * createDummy
     * Создание экземпляра объекта с тестовым наполнением параметров
     * @return static
     */
    public static function createDummy(): static
    {
        $doctor = new static();
        $doctor
            ->departmentFactory(1, 'Отделение врача')
            ->specialtyFactory(2, 'Специальность врача')
            ->setLastName('Фамилия врача')
            ->setFirstName('Имя врача')
            ->setSecondName('Фамилия врача')
            ->setBirthDay('1992-02-02')
            ->setSex(1);
        return $doctor;
    }
    public function _toArray(): array
    {
        $data = parent::_toArray();
        if ($this->department) {
            $data['department'] = $this->department->_toArray();
        }
        if ($this->specialty) {
            $data['specialty'] = $this->specialty->_toArray();
        }
        return $data;
    }
}
