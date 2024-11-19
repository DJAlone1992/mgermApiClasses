<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

/**
 * Сущность кабинета
 */
class Cabinet extends IdNameClass
{
    public const dummyArray =
    [
        'department' => [
            'nameObj' => [
                'nominativeCase'    => 'Отделение',
                'genitiveCase'      => 'Отделения',
                'dativeCase'        => 'Отделению',
                'accusativeCase'    => 'Отделение',
                'creativeCase'      => 'Отделением',
                'prepositionalCase' => 'Отделении',
            ],
            'name'    => 'Отделение',
            'id'      => 1,
        ],
        'nameObj'    => [
            'nominativeCase'    => '[Кабинет]',
            'genitiveCase'      => '[Кабинета]',
            'dativeCase'        => '[Кабинету]',
            'accusativeCase'    => '[Кабинет]',
            'creativeCase'      => '[Кабинетом]',
            'prepositionalCase' => '[Кабинете]',
        ],
        'name'       => '[Кабинет]',
        'id'         => 1,
    ];
    /**
     * Номер кабинета
     * @var int|null|null
     */
    private ?int $number = null;
    /**
     * Отделение
     * @var Department|null
     */
    private ?Department $department;

    public function __construct()
    {
        parent::__construct();
        $this->department = new Department();
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
    public static function SelfFactory(?int $id, ?string $name): static
    {
        $me = new static();
        $me->factory($id, $name);
        return $me;
    }
    public static function createDummy(): static
    {
        $me = self::SelfFactory(1, '[Кабинет]');
        $me->getNameObj()
            ->setGenitiveCase('[Кабинета]')
            ->setDativeCase('[Кабинету]')
            ->setAccusativeCase('[Кабинет]')
            ->setCreativeCase('[Кабинетом]')
            ->setPrepositionalCase('[Кабинете]');
        $me->department = Department::createDummy();
        return $me;
    }

    /**
     ** Отделение кабинета
     * @return Department|null
     */
    public function getDepartment(): ?Department
    {
        return $this->department;
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
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int|null $number
     *
     * @return static
     */
    public function setNumber(?int $number): static
    {
        $this->number = $number;

        return $this;
    }
}
