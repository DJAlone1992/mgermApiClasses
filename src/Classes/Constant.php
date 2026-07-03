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
    private string $value;
    /**
     ** Текст константы (отображаемое значение)
     * @var string
     */
    private string $text;
    /**
     ** Группа константы
     * @var string
     */
    private string $group;
    public function setValue(string $value): static
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

    public function setText(string $text): static
    {
        $this->text = $text;
        return $this;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): static
    {
        $this->group = $group;
        return $this;
    }

    public static function createDummy(bool $imitateReal = false): static
    {
        $me = new static();
        $me->setId(1)->setValue('1')->setText('Индивидуальный расчет')->setGroup('contract_type');
        return $me;
    }
}
