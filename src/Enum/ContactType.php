<?php

namespace MgermApiClasses\Enum;

/**
 * Перечисление для типов контактов
 */

final class ContactType
{
    public const MobilePhone = 1;
    public const Phone = 2;
    public const DefaultEmail = 3;
    public const Email = 4;
    public const TelegramId = 5;
    public const VkId = 6;
    public const Unknown = 0;
}
