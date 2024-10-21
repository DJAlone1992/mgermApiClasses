<?php

namespace MgermApiClasses\Enum;

/**
 * Перечисление для статусов ответа от ВАТС при осуществлении звонка
 */

final class CallFromPBXstatus
{
    public const NO_ANSWER = 'NO_ANSWER'; //Пациент не ответил
    public const CONFIRM = 'CONFIRM'; //Пациент подтвердил прием
    public const DENIED = 'DENIED'; //Пациент отменил прием
    public const FAILED = 'FAILED'; //Звонок не удался
    public const CANCELLED = 'CANCELLED'; //Задача обзвона была отменена
    public const TRIES_ENDED = 'TRIES_ENDED'; //Количество попыток проверки статуса превысило лимит
}
