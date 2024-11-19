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
            'nominativeCase' => '[Администратор]',
            'genitiveCase'      => '[Администратора]',
            'dativeCase'        => '[Администратору]',
            'accusativeCase'    => '[Администратора]',
            'creativeCase'      => '[Администратором]',
            'prepositionalCase' => '[Администраторе]'
        ],
        'name' => '[Администратор]',
        'id' => 1
    ];
    public static function createDummy(): static
    {
        $me = self::SelfFactory(1, '[Администратор]');
        $me->getNameObj()
            ->setGenitiveCase('[Администратора]')
            ->setDativeCase('[Администратору]')
            ->setAccusativeCase('[Администратора]')
            ->setCreativeCase('[Администратором]')
            ->setPrepositionalCase('[Администраторе]');
        return $me;
    }

    public static function SelfFactory(?int $id, ?string $name): static
    {
        $me = new static();
        $me->factory($id, $name);
        return $me;
    }
}
