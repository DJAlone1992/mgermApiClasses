<?php

namespace MgermApiClasses;

class Specialty
{
    private string $name;
    private int $id;

    public function factory(int $id, string $name): static
    {
        $this->setId($id)->setName($name);
        return $this;
    }
    /**
     * SelfFactory
     * Создание экземпляра объекта
     * @param  int $id
     * @param  string $name
     * @return static
     */
    public static function SelfFactory(int $id, string $name): static
    {
        $specialty = new static();
        $specialty->setId($id)->setName($name);
        return $specialty;
    }
    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }
    public function _toArray(): array
    {
        $data = [];
        if ($this->id) {
            $data['id'] = $this->id;
        }
        if ($this->name) {
            $data['name'] = $this->name;
        }
        return $data;
    }
}
