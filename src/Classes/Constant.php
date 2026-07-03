<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\BaseClass;

/**
 * Константа из МИС
 */
class Constant extends BaseClass
{
    public const dummyArray = [
        'id' => 1,
        'text' => 'Индивидуальный расчет',
        'group' => 'contract_type',
        'value' => '1'
    ];
    /**
     ** Значение константы
     * @var string
     */
    private $value;
    /**
     ** Текст константы (отображаемое значение)
     * @var string
     */
    private $text;
    /**
     ** Группа константы
     * @var string
     */
    private $group;
    /**
     * @return static
     */
    public function setValue(string $value)
    {
        $this->value = $value;
        return $this;
    }
    public function getValue(): string
    {
        return $this->value;
    }

    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return static
     */
    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * @return static
     */
    public function setGroup(string $group)
    {
        $this->group = $group;
        return $this;
    }

    /**
     * @return static
     */
    public static function createDummy(bool $imitateReal = false)
    {
        $me = new static();
        $me->setId(1)->setValue('1')->setText('Индивидуальный расчет')->setGroup('contract_type');
        return $me;
    }
}
