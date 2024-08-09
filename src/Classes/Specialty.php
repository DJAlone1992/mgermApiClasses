<?php

namespace MgermApiClasses\Classes;


use MgermApiClasses\Base\IdNameClass;

class Specialty extends IdNameClass
{
    public const dummyArray =
    [

        'nameObj' => [
            'nominativeCase' => 'Специальность'
        ],
        'name' => 'Специальность',
        'id' => 1
    ];
    /**
     * @return static
     */
    public static function SelfFactory(?int $id, ?string $name)
    {
        $specialty = new static();
        $specialty->setId($id)->setName($name);
        return $specialty;
    }
    /**
     * @return static
     */
    public static function createDummy()
    {
        return self::SelfFactory(1, 'Специальность');
    }
}
