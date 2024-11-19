<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Enum\Sex;

/**
 * Класс врача из MGERM
 */
class Doctor extends Person
{
    public const dummyArray
    = [
        'lastNameObj'   => [
            'nominativeCase'    => 'Фамилия врача',
            'genitiveCase'      => 'Фамилии врача',
            'dativeCase'        => 'Фамилии врача',
            'accusativeCase'    => 'Фамилию врача',
            'creativeCase'      => 'Фамилией врача',
            'prepositionalCase' => 'Фамилии врача',
        ],
        'lastName'      => 'Фамилия врача',
        'firstNameObj'  => [
            'nominativeCase'    => 'Имя врача',
            'genitiveCase'      => 'Имени врача',
            'dativeCase'        => 'Имя врача',
            'accusativeCase'    => 'Имя врача',
            'creativeCase'      => 'Именем врача',
            'prepositionalCase' => 'Имени врача',
        ],
        'firstName'     => 'Имя врача',
        'secondNameObj' => [
            'nominativeCase'    => 'Отчество врача',
            'genitiveCase'      => 'Отчества врача',
            'dativeCase'        => 'Отчество врача',
            'accusativeCase'    => 'Отчество врача',
            'creativeCase'      => 'Отчеством врача',
            'prepositionalCase' => 'Отчестве врача',
        ],
        'secondName'    => 'Отчество врача',
        'sex'           => Sex::Male,
        'sexName'       => Sex::Names[Sex::Male],
        'id'            => 2,
        'birthDay'      => '1992-02-02 00:00:00',
        'department'    => Department::dummyArray,
        'specialty'     => Specialty::dummyArray,
        'guid'          => Guid::dummyArray,
        'contactsCount' => 0,
        'contacts'      => []
    ];
    /**
     ** Специальность
     * @var Specialty|null
     */
    private ?Specialty $specialty;
    /**
     ** Отделение
     * @var Department|null
     */
    private ?Department $department;

    /**
     ** Группа
     * @var Guid|null
     */
    private ?Guid $guid;

    public function __construct()
    {
        parent::__construct();
        $this->specialty  = new Specialty();
        $this->department = new Department();
        $this->guid       = new Guid();
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
     * @param int|null $id
     * @param string|null $name
     *
     * @return static
     */
    public function guidFactory(?int $id, ?string $name): static
    {
        $this->guid->factory($id, $name);
        return $this;
    }

    /**
     ** Специальность врача
     * @return Specialty|null
     */
    public function getSpecialty(): ?Specialty
    {
        return $this->specialty;
    }

    /**
     ** Отделение врача
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
    public static function createDummy(bool $imitateReal = false): static
    {
        $doctor = new static();
        $doctor
            ->setGuid(Guid::createDummy($imitateReal))
            ->setDepartment(Department::createDummy($imitateReal))
            ->setSpecialty(Specialty::createDummy($imitateReal));
        if ($imitateReal) {
            $doctor
                ->setLastName('Петров')
                ->setFirstName('Петр')
                ->setSecondName('Петрович')
                ->setBirthDay('1992-02-02')
                ->setSex(Sex::Male)
                ->setId(2);
            $doctor->getLastNameObj()
                ->setGenitiveCase('Петрова')
                ->setDativeCase('Петрову')
                ->setAccusativeCase('Петрова')
                ->setCreativeCase('Петровым')
                ->setPrepositionalCase('Петрове');
            $doctor->getFirstNameObj()
                ->setGenitiveCase('Петра')
                ->setDativeCase('Петру')
                ->setAccusativeCase('Петра')
                ->setCreativeCase('Петром')
                ->setPrepositionalCase('Петре');
            $doctor->getSecondNameObj()
                ->setGenitiveCase('Петровича')
                ->setDativeCase('Петровичу')
                ->setAccusativeCase('Петровича')
                ->setCreativeCase('Петровичем')
                ->setPrepositionalCase('Петровиче');
        } else {
            $doctor
                ->setLastName('Фамилия врача')
                ->setFirstName('Имя врача')
                ->setSecondName('Отчество врача')
                ->setBirthDay('1992-02-02')
                ->setSex(Sex::Male)
                ->setId(2);
            $doctor->getLastNameObj()
                ->setGenitiveCase('Фамилии врача')
                ->setDativeCase('Фамилии врача')
                ->setAccusativeCase('Фамилию врача')
                ->setCreativeCase('Фамилией врача')
                ->setPrepositionalCase('Фамилии врача');
            $doctor->getFirstNameObj()
                ->setGenitiveCase('Имени врача')
                ->setDativeCase('Имя врача')
                ->setAccusativeCase('Имя врача')
                ->setCreativeCase('Именем врача')
                ->setPrepositionalCase('Имени врача');
            $doctor->getSecondNameObj()
                ->setGenitiveCase('Отчества врача')
                ->setDativeCase('Отчество врача')
                ->setAccusativeCase('Отчество врача')
                ->setCreativeCase('Отчеством врача')
                ->setPrepositionalCase('Отчестве врача');
        }

        return $doctor;
    }

    /**
     ** Группа пользователя врача
     * @return Guid|null
     */
    public function getGuid(): ?Guid
    {
        return $this->guid;
    }
    /**
     * @param Guid|null $guid
     *
     * @return static
     */
    public function setGuid(?Guid $guid): static
    {
        $this->guid = $guid;

        return $this;
    }
}
