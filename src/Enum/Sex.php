<?php

namespace MgermApiClasses\Enum;

/**
 * Перечисление для пола в MGERM
 */
final class Sex
{
    public const Male = 1;
    public const Female = 2;
    public const Unknown = 0;
    public const Names = [self::Male => "male", self::Female => "female", self::Unknown => "unknown"];
}
