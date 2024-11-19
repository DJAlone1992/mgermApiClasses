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
        'department' => Department::dummyArray,
        'nameObj'    => [
            'nominativeCase'    => '[Кабинет]',
            'genitiveCase'      => '[Кабинета]',
            'dativeCase'        => '[Кабинету]',
            'accusativeCase'    => '[Кабинет]',
            'creativeCase'      => '[Кабинетом]',
            'prepositionalCase' => '[Кабинете]',
        ],
        'name'       => '[Кабинет]',
        'number'     => 100,
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
    public function departmentFactory(?int $id, ?string $name)
    {
        $this->department->factory($id, $name);
        return $this;
    }
    /**
     * @return static
     */
    public static function SelfFactory(?int $id, ?string $name)
    {
        $me = new static();
        $me->factory($id, $name);
        return $me;
    }
    public static function createDummy(bool $imitateReal = false): static
    {
        if ($imitateReal) {
            $me = self::SelfFactory(1, 'Процедурный кабинет')->setNumber(100);
            $me->getNameObj()
                ->setGenitiveCase('Процедурного кабинета')
                ->setDativeCase('Процедурному кабинету')
                ->setAccusativeCase('Процедурный кабинет')
                ->setCreativeCase('Процедурным кабинетом')
                ->setPrepositionalCase('Процедурном кабинете');
        } else {
            $me = self::SelfFactory(1, '[Кабинет]')->setNumber(100);
            $me->getNameObj()
                ->setGenitiveCase('[Кабинета]')
                ->setDativeCase('[Кабинету]')
                ->setAccusativeCase('[Кабинет]')
                ->setCreativeCase('[Кабинетом]')
                ->setPrepositionalCase('[Кабинете]');
        }
        $me->department = Department::createDummy($imitateReal);
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
    public function setDepartment(?Department $department)
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
    public function setNumber(?int $number)
    {
        $this->number = $number;

        return $this;
    }
}
