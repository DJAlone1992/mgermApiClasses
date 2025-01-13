<?php

namespace MgermApiClasses\Services;

use MgermApiClasses\Base\BaseClass;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

/**
 * Serializer
 * Объект для превращения класса в массив и обратно
 */
class Serializer
{

    protected SymfonySerializer $serializer;
    protected array $serializerContext = [
        AbstractNormalizer::IGNORED_ATTRIBUTES => ['serializer', 'serializerContext', 'fullName', 'lastNameWithInitials'],
        AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
        AbstractObjectNormalizer::SKIP_UNINITIALIZED_VALUES => true,
        DateTimeNormalizer::FORMAT_KEY => 'Y-m-d H:i:s'
    ];
    public function __construct()
    {

        $encoders = [
            new JsonEncoder()
        ];
        $normalizers = [

            new DateTimeNormalizer(),
            new BackedEnumNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(
                propertyTypeExtractor: new PropertyInfoExtractor(
                    typeExtractors: [new PhpDocExtractor(), new ReflectionExtractor()],
                ),
            ),
        ];
        $this->serializer = new SymfonySerializer($normalizers, $encoders);
    }

    /**
     * Преобразование объекта в массив для отправки в запросе
     * @param BaseClass $object
     *
     * @return array
     */
    public function prepareArray(BaseClass $object): array
    {

        $json = $this->serializer->serialize($object, JsonEncoder::FORMAT, $this->serializerContext);
        return json_decode($json, true);
    }

    /**
     * Преобразование массива обратно в готовый класс
     * @param array $array
     * @param string $type
     *
     * @return BaseClass
     */
    public function parseArray(array $array, string $type): BaseClass
    {
        $context = $this->serializerContext;
        $context[AbstractNormalizer::OBJECT_TO_POPULATE] = $type;
        $object = $this->serializer->deserialize(json_encode($array), $type, JsonEncoder::FORMAT, $this->serializerContext);
        return $object;
    }

    /**
     * Преобразование массива в массив без вложенности
     * @param array $array
     * @param string|null $prefix
     *
     * @return array
     */
    public function noIndents(array $array, string $prefix = null): array
    {
        $result = [];
        foreach ($array as $key => $item) {
            if (is_array($item)) {
                $result = array_merge($result, $this->noIndents($item, $prefix . $key . '_'));
            } else {
                $result[$prefix . $key] = $item;
            }
        }
        return $result;
    }

    /**
     * Обратная функция к noIndents
     * @param array $array
     *
     * @return array
     */
    public function reverseIndents(array $array): array
    {
        $seen = [];
        $result = [];
        foreach ($array as $key => $item) {
            if (in_array($key, $seen)) {
                continue;
            }
            if (str_contains($key, '_')) {
                $keys = explode('_', $key);
                $inKey = $keys[0];
                $subArray = [];
                foreach ($array as $twoKey => $twoItem) {
                    if (str_starts_with($twoKey, "{$inKey}_") !== FALSE) {
                        $subKey = str_replace("{$inKey}_", '', $twoKey);
                        $subArray[$subKey] = $twoItem;
                        $seen[] = $twoKey;
                    }
                }
                $result[$inKey] = $this->reverseIndents($subArray);
                $seen[] = $key;
            } else {
                $result[$key] = $item;
            }
        }
        return $result;
    }
}
