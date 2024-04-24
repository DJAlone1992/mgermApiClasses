<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\IdNameClass;

class Guid extends IdNameClass
{
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
