<?php

namespace MgermApiClasses;

use MgermApiClasses\Base\BaseClass;
use MgermApiClasses\Enum\ContactType;

class Contact extends BaseClass
{

    /**
     * @var string
     */
    private string $value;
    /**
     * @var ContactType
     */
    private ContactType $type;

    /**
     * Get the value of value
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */
    public function setValue($value): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType(): ContactType
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType(int|ContactType $type)
    {
        if (is_int($type)) {
            $type = ContactType::from($type);
        }
        $this->type = $type;

        return $this;
    }
    public static function createDummy(): static
    {
        $contact = new static();
        $contact->setType(ContactType::MobilePhone, '+79998887711');
        return $contact;
    }
}
