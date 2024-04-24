<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Cabinet extends IdNameClass
{
    /**
     * Номер кабинета
     * @var int|null|null
     */
    private ?int $number = null;
    /**
     * @var Department|null
     */
    private ?Department $department;

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
    public function setDepartment(?Department $department): static
    {
        $this->department = $department;

        return $this;
    }
}