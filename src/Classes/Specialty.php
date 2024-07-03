<?php

namespace MgermApiClasses\Classes;


use MgermApiClasses\Base\IdNameClass;

class Specialty extends IdNameClass
{

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
