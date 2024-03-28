<?php

namespace MgermApiClasses;

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
        AbstractNormalizer::IGNORED_ATTRIBUTES => ['serializer', 'serializerContext'],
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
     * prepareArray
     *
     * @param  BaseClass $object
     * @return array
     */
    public function prepareArray(BaseClass $object): array
    {

        $json = $this->serializer->serialize($object, JsonEncoder::FORMAT, $this->serializerContext);
        return json_decode($json, true);
    }

    /**
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
}
