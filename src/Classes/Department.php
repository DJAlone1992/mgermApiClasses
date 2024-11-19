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
            'nominativeCase'    => 'Отделение',
            'genitiveCase'      => 'Отделения',
            'dativeCase'        => 'Отделению',
            'accusativeCase'    => 'Отделение',
            'creativeCase'      => 'Отделением',
            'prepositionalCase' => 'Отделении',
        ],
        'name'    => 'Отделение',
        'id'      => 1,
    ];
    public static function SelfFactory(?int $id, ?string $name): static
    {
        $department = new static();
        $department->setId($id)->setName($name);
        return $department;
    }
    public static function createDummy(): static
    {
        $me = self::SelfFactory(1, 'Отделение');
        $me->getNameObj()
            ->setGenitiveCase('Отделения')
            ->setDativeCase('Отделению')
            ->setAccusativeCase('Отделение')
            ->setCreativeCase('Отделением')
            ->setPrepositionalCase('Отделении');
        return $me;
    }
}
