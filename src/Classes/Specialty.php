<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Specialty extends IdNameClass
{
    public const dummyArray =
    [

        'nameObj' => [
            'nominativeCase'    => 'Специальность',
            'genitiveCase'      => 'Специальности',
            'dativeCase'        => 'Специальности',
            'accusativeCase'    => 'Специальность',
            'creativeCase'      => 'Специальностью',
            'prepositionalCase' => 'Специальности',
        ],
        'name'    => 'Специальность',
        'id'      => 1,
    ];
    public static function SelfFactory(?int $id, ?string $name): static
    {
        $specialty = new static();
        $specialty->setId($id)->setName($name);
        return $specialty;
    }
    public static function createDummy(bool $imitateReal = false): static
    {
        if ($imitateReal) {
            $me = self::SelfFactory(1, 'Врач общей практики');
            $me->getNameObj()
                ->setGenitiveCase('Врача общей практики')
                ->setDativeCase('Врачу общей практики')
                ->setAccusativeCase('Врача общей практики')
                ->setCreativeCase('Врачом общей практики')
                ->setPrepositionalCase('Враче общей практики');
        } else {
            $me = self::SelfFactory(1, 'Специальность');
            $me->getNameObj()
                ->setGenitiveCase('Специальности')
                ->setDativeCase('Специальности')
                ->setAccusativeCase('Специальность')
                ->setCreativeCase('Специальностью')
                ->setPrepositionalCase('Специальности');
        }
        return $me;
    }
}
