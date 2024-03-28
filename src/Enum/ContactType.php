<?php

namespace MgermApiClasses\Enum;

/**
 * Перечисление для типов контактов
 */
enum ContactType: int
{
    case MobilePhone = 1;
    case Phone = 2;
    case DefaultEmail = 3;
    case Email = 4;
}
