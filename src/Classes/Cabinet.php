<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Cabinet extends IdNameClass
{
    public const dummyArray =
    [
        'department' => [
            'nameObj' => [
                'nominativeCase' => 'Отделение'
            ],
            'name' => 'Отделение',
            'id' => 1
        ],
        'nameObj' => [
            'nominativeCase' => '[Кабинет]'
        ],
        'name' => '[Кабинет]',
        'id' => 1
    ];
    /**
     * Номер кабинета
     * @var int|null|null
     */
    private $number;
    /**
     * @var Department|null
     */
    private $department;

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
    /**
     * @return static
     */
    public static function createDummy()
    {
        $me = self::SelfFactory(1, '[Кабинет]');
        $me->department = Department::createDummy();
        return $me;
    }


    /**
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
