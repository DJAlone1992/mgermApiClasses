<?php
namespace MgermApiClasses\Enum;

/**
 * Перечисление для типов контактов
 */
enum ContactType: int
{
    case Phone = 1;
    case Email = 2;
}