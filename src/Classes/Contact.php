<?php

namespace MgermApiClasses\Classes;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Enum\ContactType;

class Contact extends BaseClass
{
    public const dummyArray
    = [
        'value' => '+79999999999',
        'type' => 1
    ];


    /**
     * @var string|null
     */
    private ?string $value;
    /**
     * @var int|null
     */
    private ?int $type = ContactType::Unknown;


    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }


    /**
     * @param string|null $value
     *
     * @return static
     */
    public function setValue(?string $value): static
    {
        $this->value = $value;

        return $this;
    }


    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }


    /**
     * @param int|null $type
     *
     * @return static
     */
    public function setType(?int $type): static
    {
        if (is_null($type) || $type < 1 || $type > 4) {
            $type = ContactType::Unknown;
        }
        $this->type = $type;

        return $this;
    }
    public static function createDummy(): static
    {
        $contact = new static();
        $contact->setType(ContactType::MobilePhone)->setValue('+79999999999');
        return $contact;
    }
}
