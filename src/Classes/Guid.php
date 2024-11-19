<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

/**
 * Группа пользователя MGERM
 */
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
    public static function createDummy(): static
    {
        return self::SelfFactory(1, '[Администратор]');
    }

    public static function SelfFactory(?int $id, ?string $name): static
    {
        $me = new static();
        $me->factory($id, $name);
        return $me;
    }
}
