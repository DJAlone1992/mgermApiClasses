<?php

namespace MgermApiClasses\Security;

use DateTime;

class DataSigner
{
    private const STATIC_SALT = 'D9aFgr3X5RN8qC4cmfsv';
    /**
     * Функция подписания массива данных
     * Модифицирует переданный массив
     * Возвращает модифицированный массив
     * @param array $data Массив данных
     * @return array Подписанный массив
     */
    public static function sign(array &$data): array
    {
        $serialized = serialize($data);
        $timestamp = (new DateTime())->getTimestamp();
        $salt = self::__generateRandomString(256);
        $data['signTimestamp'] = $timestamp;
        $data['salt'] = $salt;
        $data['signature'] = self::_createSignature($serialized, $timestamp, $salt);
        return $data;
    }

    /**
     * Валидация массива параметров.
     * Возвращает результат проверки: True если проверка пройдена, False если проверка не пройдена
     * @param array $data Массив для проверки
     *
     * @return bool
     */
    public static function validate(array $data): bool
    {
        $timestamp = $data['signTimestamp'];
        $salt = $data['salt'];
        $signature =        $data['signature'];
        $clone = unserialize(serialize($data));
        self::cleanValidationData($clone);
        $serialized = serialize($clone);
        return self::_createSignature($serialized, $timestamp, $salt) == $signature;
    }

    /**
     * Очистка валидации из массива педедачи информации
     * @param array $data
     *
     * @return void
     */
    public static function cleanValidationData(array &$data): void
    {
        unset($data['signTimestamp']);
        unset($data['salt']);
        unset($data['signature']);
    }

    /**
     * Функция создания HASH SHA256 строки для данных
     * @param string $serializedData Сериализованные данные
     * @param int $timestamp UNIX метка времени
     * @param string $salt Соль
     *
     * @return string
     */
    private static function _createSignature(string $serializedData, int $timestamp, string $salt): string
    {
        $data = $salt . self::STATIC_SALT . $serializedData . self::STATIC_SALT . $timestamp . self::STATIC_SALT;
        return hash('sha256', $data);
    }

    /**
     * Генерация произвольной строки
     * @param int $length Длина
     *
     * @return string
     */
    private static function __generateRandomString(int $length = 256): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
