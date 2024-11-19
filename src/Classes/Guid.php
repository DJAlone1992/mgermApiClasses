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
    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        if ($imitateReal) {
            $me = self::SelfFactory(11, 'Врач-специалист');
            $me->getNameObj()
                ->setGenitiveCase('Врача-специалиста')
                ->setDativeCase('Врачу-специалисту')
                ->setAccusativeCase('Врача-специалиста')
                ->setCreativeCase('Врачом-специалистом')
                ->setPrepositionalCase('Враче-специалисте');
        } else {
            $me = self::SelfFactory(1, '[Администратор]');
            $me->getNameObj()
                ->setGenitiveCase('[Администратора]')
                ->setDativeCase('[Администратору]')
                ->setAccusativeCase('[Администратора]')
                ->setCreativeCase('[Администратором]')
                ->setPrepositionalCase('[Администраторе]');
        }
        return $me;
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
