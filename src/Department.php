<?php

namespace MgermApiClasses;

use MgermApiClasses\Base\IdNameClass;

/**
 * Класс для работы с отделением MGERM
 */
class Department extends IdNameClass
{

    public static function SelfFactory(int $id, string $name): static
    {
        $department = new static();
        $department->setId($id)->setName($name);
        return $department;
    }
    public static function createDummy(): static
    {
        return self::SelfFactory(1, 'Отделение');
    }
}
