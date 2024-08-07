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
    public static function SelfFactory(?int $id, ?string $name): static
    {
        $specialty = new static();
        $specialty->setId($id)->setName($name);
        return $specialty;
    }
    public static function createDummy(): static
    {
        return self::SelfFactory(1, 'Специальность');
    }
}
