<?php

namespace MgermApiClasses;

/**
 * Класс врача из MGERM
 */
class Doctor extends Person
{
    /**
     * @var Specialty|null
     */
    private ?Specialty $specialty;
    /**
     * @var Department|null
     */
    private ?Department $department;

    public function __construct()
    {
        $this->specialty = new Specialty();
        $this->department = new Department();
    }
    /**
     * @param Specialty|null $specialty
     *
     * @return static
     */
    public function setSpecialty(?Specialty $specialty): static
    {
        $this->specialty = $specialty;
        return $this;
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
    /**
     * @param int|null $id
     * @param string|null $name
     *
     * @return static
     */
    public function specialtyFactory(?int $id, ?string $name): static
    {
        $this->specialty->factory($id, $name);
        return $this;
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
     * @return Specialty|null
     */
    public function getSpecialty(): ?Specialty
    {
        return $this->specialty;
    }


    /**
     * @return Department|null
     */
    public function getDepartment(): ?Department
    {
        return $this->department;
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
            ->setSecondName('Отчество врача')
            ->setBirthDay('1992-02-02')
            ->setSex(1)
            ->setId(2);
        return $doctor;
    }
}
