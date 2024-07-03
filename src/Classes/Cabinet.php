<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Cabinet extends IdNameClass
{
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
        return self::SelfFactory(1, '[Кабинет]');
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
    public function getNumber():?int
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