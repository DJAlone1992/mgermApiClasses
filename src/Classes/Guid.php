<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Guid extends IdNameClass
{
    public const dummyArray
    = [
        'nameObj' => [
            'nominativeCase' => '[Администратор]'
        ],
        'name' => '[Администратор]',
        'id' => 1
    ];
    /**
     * @return static
     */
    public static function createDummy()
    {
        return self::SelfFactory(1, '[Администратор]');
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
}
