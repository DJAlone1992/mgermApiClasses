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
    public static function createDummy(bool $imitateReal = false)
    {
        if ($imitateReal) {
            $me = self::SelfFactory(1, 'Поликлиническое отделение');
            $me->getNameObj()
                ->setGenitiveCase('Поликлинического отделения')
                ->setDativeCase('Поликлиническому отделению')
                ->setAccusativeCase('Поликлиническое отделение')
                ->setCreativeCase('Поликлиническим отделением')
                ->setPrepositionalCase('Поликлиническом отделении');
        } else {
            $me = self::SelfFactory(1, 'Отделение');
            $me->getNameObj()
                ->setGenitiveCase('Отделения')
                ->setDativeCase('Отделению')
                ->setAccusativeCase('Отделение')
                ->setCreativeCase('Отделением')
                ->setPrepositionalCase('Отделении');
        }
        return $me;
    }
}
