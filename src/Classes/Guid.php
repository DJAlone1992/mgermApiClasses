<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Guid extends IdNameClass
{
    /**
     * @return static
     */
    public const dummyArray
    = [
        'nameObj' => [
            'nominativeCase' => '[Администратор]'
        ],
        'name' => '[Администратор]',
        'id' => 1
    ];
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
