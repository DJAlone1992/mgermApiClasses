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
        'sex'           => 1,
        'id'            => 2,
        'birthDay'      => '1992-02-02 00:00:00',
        'sexName'       => 'male',
        'department'    => [
            'nameObj' => [
                'nominativeCase'    => 'Отделение врача',
                'genitiveCase'      => 'Отделения врача',
                'dativeCase'        => 'Отделению врача',
                'accusativeCase'    => 'Отделение врача',
                'creativeCase'      => 'Отделением врача',
                'prepositionalCase' => 'Отделении врача',
            ],
            'name'    => 'Отделение врача',
            'id'      => 1,
        ],
        'specialty'     => [
            'nameObj' => [
                'nominativeCase'    => 'Специальность врача',
                'genitiveCase'      => 'Специальности врача',
                'dativeCase'        => 'Специальности врача',
                'accusativeCase'    => 'Специальность врача',
                'creativeCase'      => 'Специальностью врача',
                'prepositionalCase' => 'Специальности врача',
            ],
            'name'    => 'Специальность врача',
            'id'      => 2,
        ],
        'guid'          => [
            'nameObj' => [
                'nominativeCase'    => 'Врач-специалист',
                'genitiveCase'      => 'Врача-специалиста',
                'dativeCase'        => 'Врачу-специалисту',
                'accusativeCase'    => 'Врача-специалиста',
                'creativeCase'      => 'Врачом-специалистом',
                'prepositionalCase' => 'Враче-специалисте',
            ],
            'name'    => 'Врач-специалист',
            'id'      => 11,
        ],
        'contactsCount' => 0,
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
    public static function createDummy(): static
    {
        $doctor = new static();
        $doctor
            ->guidFactory(11, 'Врач-специалист')
            ->departmentFactory(1, 'Отделение врача')
            ->specialtyFactory(2, 'Специальность врача')
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
        $doctor->getDepartment()->getNameObj()
            ->setGenitiveCase('Отделения врача')
            ->setDativeCase('Отделению врача')
            ->setAccusativeCase('Отделение врача')
            ->setCreativeCase('Отделением врача')
            ->setPrepositionalCase('Отделении врача');
        $doctor->getSpecialty()->getNameObj()
            ->setGenitiveCase('Специальности врача')
            ->setDativeCase('Специальности врача')
            ->setAccusativeCase('Специальность врача')
            ->setCreativeCase('Специальностью врача')
            ->setPrepositionalCase('Специальности врача');
        $doctor->getGuid()->getNameObj()
            ->setGenitiveCase('Врача-специалиста')
            ->setDativeCase('Врачу-специалисту')
            ->setAccusativeCase('Врача-специалиста')
            ->setCreativeCase('Врачом-специалистом')
            ->setPrepositionalCase('Враче-специалисте');
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
