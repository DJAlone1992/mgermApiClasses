<?php

namespace MgermApiClasses;

use MgermApiClasses\Enum\ContactType;

class Contact extends Person
{
    private string $value;
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
    public function setType(ContactType $type)
    {
        $this->type = $type;

        return $this;
    }
}
