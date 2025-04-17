<?php

namespace MgermApiClasses\Services;

use DateTime;
use DateTimeImmutable;
use Exception;
use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Base\CaseString;
use ReflectionClass;
use ReflectionMethod;
use ReflectionProperty;

/**
 * Класс для создания описания параметров
 */
class BaseClassDescriptor
{
    private const RussianTypes = [
        'bool' => 'Логический тип',
        'int' => 'Целое число',
        'integer' => 'Целое число',
        'float' => 'Дробное число',
        'double' => 'Дробное число',
        'string' => 'Строка',
        'array' => 'Массив',
        'object' => 'Объект',
        'callable' => 'Функции',
        'resource' => 'Ресурс',
    ];


    /**
     * Получение параметра по префиксу из phpDoc для метода, параметра или класса
     * @param ReflectionClass|ReflectionMethod|ReflectionProperty $reflectionVar
     * @param string $varPrefix
     *
     * @return string
     */
    private static function __getDocVar($reflectionVar, string $varPrefix = '**'): string
    {
        $doc      = $reflectionVar->getDocComment();
        $docArray = explode("\n", $doc);
        foreach ($docArray as $docLine) {
            if (strpos($docLine, $varPrefix) !== false && strpos($docLine, '/**') === false) {
                return trim(preg_replace("#((\/)?(\*{1,2})(\/)?)#si", "", str_replace($varPrefix, '', $docLine)));
            }
        }
        return '';
    }

    /**
     * Получение описания из родительского класса
     * @param ReflectionClass $reflectionClass
     * @param string $methodName
     * @param string $varName
     *
     * @return string
     */
    private static function __getDescriptionFromParents(ReflectionClass $reflectionClass, string $methodName, string $varName, string $varPrefix = '**'): string
    {
        $parent = $reflectionClass->getParentClass();
        if ($parent === false) {
            return '';
        }
        if (!$parent->hasMethod($methodName)) {
            return self::__getDescriptionFromParents($parent, $methodName, $varName, $varPrefix);
        }

        $description = self::__getPropDescription($parent, $parent->getMethod($methodName), $varName, $varPrefix);

        if (!$description) {
            return self::__getDescriptionFromParents($parent, $methodName, $varName, $varPrefix);
        }
        return trim($description);
    }
    /**
     * Получение описания для метода
     * @param ReflectionClass $reflectionClass
     * @param ReflectionMethod $reflectionMethod
     * @param string $varName
     *
     * @return string
     */
    private static function __getPropDescription(ReflectionClass $reflectionClass, ReflectionMethod $reflectionMethod, string $varName, string $varPrefix = '**'): string
    {
        $description = self::__getDocVar($reflectionMethod, $varPrefix);
        if (!$description) {
            try {
                $description = self::__getDocVar($reflectionClass->getProperty($varName), $varPrefix);
            } catch (Exception $exception) {
                $description = '';
            }
        }

        return trim($description);
    }

    /**
     * Проверка, есть ли такой параметр
     * @param ReflectionClass $reflectionClass
     * @param string $propertyName
     *
     * @return bool
     */
    private static function __hasProperty(ReflectionClass $reflectionClass, string $propertyName): bool
    {
        if ($reflectionClass->hasProperty($propertyName)) {
            return true;
        }
        $parent = $reflectionClass->getParentClass();
        if (!$parent) {
            return false;
        }
        return self::__hasProperty($parent, $propertyName);
    }
    /**
     * Получение массива описания
     * @param BaseClass|CaseString $class
     * @param string $varNamePrepend
     *
     * @return array
     */
    public static function getDescription($class, string $varNamePrepend = ''): array
    {
        $result = [];

        $reflection = new ReflectionClass($class);

        $objMethods = $reflection->getMethods();
        foreach ($objMethods as $method) {
            $callMethodName = $method->getName();
            if (strpos($callMethodName, 'get') === false) {
                continue;
            }
            $varName = lcfirst(str_replace('get', '', $callMethodName));
            if (!self::__hasProperty($reflection, $varName)) {
                continue;
            }
            $child = $class->$callMethodName();

            $description = self::__getPropDescription($reflection, $method, $varName);
            if (!$description) {
                $description = self::__getDescriptionFromParents($reflection, $callMethodName, $varName);
            }

            $filter = self::__getPropDescription($reflection, $method, $varName, '*#');
            if (!$filter) {
                $filter = self::__getDescriptionFromParents($reflection, $callMethodName, $varName, '*#');
            }


            if ($child instanceof BaseClass || $child instanceof CaseString) {

                $defVarName = str_replace('Obj', '', $varName);
                $result[] = [
                    'name'        => 'child',
                    'description' => $description,
                    'items'       => self::getDescription($child, "{$varNamePrepend}{$varName}."),
                    'default' => $child instanceof CaseString ? "{$varNamePrepend}{$defVarName}" : '',
                    'filter' => $filter
                ];

                continue;
            }


            $result[] = [
                'name'        => "{$varNamePrepend}{$varName}",
                'description' => $description,
                'type' => self::__RussianType($child),
                'example' => self::__isExample($child),
                'filter' => $filter
            ];
        }

        return $result;
    }

    /**
     * Получение описания в виде HTML
     * @param BaseClass $class
     *
     * @return string
     */
    public static function getDescriptionHtml(BaseClass $class): string
    {
        $data            = self::getDescription($class);
        $reflectionClass = new ReflectionClass($class);
        $description     = self::__getDocVar($reflectionClass);
        return "<div class=\"card\">
            <div class=\"card-header\">{$description}</div>
            <div class=\"card-body\">" . self::__getParams($data) . "</div>
        </div>";
    }

    /**
     * Рекурсивный парсер параметров
     * @param array $items
     * @param string $accordionId
     *
     * @return string
     */
    private static function __getParams(array $items, string $accordionId = '', ?string $default = null): string
    {
        $params = $accordionItems = [];
        $echoFilter = '';
        if ($default) {
            $echoFilter = "|default({$default})";
        }
        $count  = 0;
        foreach ($items as $item) {
            if ($item['name'] == 'child') {
                $itemID           = $accordionId . '_' . $count;
                $accordionItems[] = self::__getAccordionItem($accordionId, $itemID, $item['description'], self::__getParams($item['items'], $itemID, $item['default']));
                $count++;
            } else {
                $params[] = $item;
            }
        }
        $content = '';
        if (count($params)) {
            $content .= self::__getTable($params, $echoFilter);
        }
        if (count($accordionItems)) {
            $content .= self::__getAccordion($accordionId, $accordionItems);
        }
        return $content;
    }

    /**
     * HTML Bootstrap Accordion
     * @param string $id
     * @param array $items
     *
     * @return string
     */
    private static function __getAccordion(string $id, array $items): string
    {
        $result = "<div class=\"accordion accordion-flush\" id=\"accordionFlush_{$id}\">";
        $result .= implode('', $items);
        $result .= "</div>";
        return $result;
    }

    /**
     * HTML Table
     * @param array $items
     * @param string|null $filter
     *
     * @return string
     */
    private static function __getTable(array $items, ?string $filter = null): string
    {

        $result = "<table class=\"table\"><thead><tr><th>Параметр</th><th>Наименование</th><th>Тип</th><th>Пример</th></tr></thead><tbody>";
        foreach ($items as $item) {
            $echoFilter = $item['filter'] . $filter;
            $example = $item['example'] ? "{{ {$item['name']}{$echoFilter} }}" : '';
            $result .= "<tr><td class=\"insertParameter\">{{ \"{{ {$item['name']}{$echoFilter} }}\"|raw }}</td><td>{$item['description']}</td><td>{$item['type']}</td><td>{$example}</td></tr>";
        }
        $result .= "</tbody></table>";
        return $result;
    }

    /**
     * HTML Bootstrap Accordion Item
     * @param string $accordionId
     * @param string $itemID
     * @param string $itemName
     * @param string $content
     *
     * @return string
     */
    private static function __getAccordionItem(string $accordionId, string $itemID, string $itemName, string $content): string
    {
        return "<div class=\"accordion-item\">
    <h2 class=\"accordion-header\" id=\"flush-heading_{$itemID}\">
      <button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapse_{$itemID}\" aria-expanded=\"false\" aria-controls=\"flush-collapse_{$itemID}\">
        {$itemName}
      </button>
    </h2>
    <div id=\"flush-collapse_{$itemID}\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-heading_{$itemID}\" data-bs-parent=\"#accordionFlush_{$accordionId}\">
      <div class=\"accordion-body\">
      {$content}
      </div>
    </div>
  </div>";
    }

    /**
     * Выводить ли пример на экран в HTML
     *
     * @return bool
     */
    private static function __isExample($item): bool
    {
        if (is_array($item)) {
            return false;
        }
        return true;
    }

    /**
     * Получение русского наименования типа
     *
     * @return string
     */
    private static function __RussianType($item): string
    {
        if ($item instanceof DateTime || $item instanceof DateTimeImmutable) {
            return 'Объект даты и времени';
        }

        $type = gettype($item);
        if (array_key_exists($type, self::RussianTypes)) {
            return self::RussianTypes[$type];
        }
        return '';
    }
}
