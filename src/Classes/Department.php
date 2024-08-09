<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

/**
 * Класс для работы с отделением MGERM
 */
class Department extends IdNameClass
{
    public const dummyArray =
    [
        'nameObj' => [
            'nominativeCase' => 'Отделение'
        ],
        'name' => 'Отделение',
        'id' => 1
    ];
    /**
     * @return static
     */
    public static function SelfFactory(?int $id, ?string $name)
    {
        $department = new static();
        $department->setId($id)->setName($name);
        return $department;
    }
    /**
     * @return static
     */
    public static function createDummy()
    {
        return self::SelfFactory(1, 'Отделение');
    }
}
