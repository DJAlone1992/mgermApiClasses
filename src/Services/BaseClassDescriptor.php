<?php

namespace MgermApiClasses\Services;

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


    /**
     * Получение параметра по префиксу из phpDoc для метода, параметра или класса
     * @param ReflectionClass|ReflectionMethod|ReflectionProperty $reflectionVar
     * @param string $varPrefix
     *
     * @return string
     */
    private static function __getDocVar(ReflectionClass | ReflectionMethod | ReflectionProperty $reflectionVar, string $varPrefix = '**'): string
    {
        $doc      = $reflectionVar->getDocComment();
        $docArray = explode("\n", $doc);
        foreach ($docArray as $docLine) {
            if (str_contains($docLine, $varPrefix) && !str_contains($docLine, '/**')) {
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
            } catch (Exception $e) {
                $description = '';
            }
        }

        return trim($description);
    }
    /**
     * Получение массива описания
     * @param BaseClass|CaseString $class
     * @param string $varNamePrepend
     *
     * @return array
     */
    public static function getDescription(BaseClass | CaseString $class, string $varNamePrepend = ''): array
    {
        $result = [];

        $reflection = new ReflectionClass($class);

        $objMethods = $reflection->getMethods();
        foreach ($objMethods as $method) {
            $callMethodName = $method->getName();
            if (!str_contains($callMethodName, 'get')) {
                continue;
            }
            $varName = lcfirst(str_replace('get', '', $callMethodName));

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
                'example' => $child,
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

        $result = "<table class=\"table\"><thead><tr><th>Параметр</th><th>Наименование</th><th>Пример</th></tr></thead><tbody>";
        foreach ($items as $item) {
            $echoFilter = $item['filter'] . $filter;
            $result .= "<tr><td class=\"insertParameter\">{{ {$item['name']}{$echoFilter} }}</td><td>{$item['description']}</td><td>{$item['example']}</td></tr>";
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
}
