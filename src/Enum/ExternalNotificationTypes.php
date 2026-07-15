<?php

namespace MgermApiClasses\Enum;

/**
 * Перечисление видов преднастоенных уведомлений
 */
final class ExternalNotificationTypes
{
    public const Referral = 1;
    public const Analysis = 2;
    public const AfterVisit = 3;
    public const Unknown = 0;
}
