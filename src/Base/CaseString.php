<?php

namespace MgermApiClasses\Base;

/** Объект строки, хранящий падежи */
class CaseString
{
    /**
     * @var string|null
     */
    private ?string $nominativeCase = null;
    /**
     * @var string|null
     */
    private ?string $genitiveCase = null;
    /**
     * @var string|null
     */
    private ?string $dativeCase = null;
    /**
     * @var string|null
     */
    private ?string $accusativeCase = null;
    /**
     * @var string|null
     */
    private ?string $creativeCase = null;
    /**
     * @var string|null
     */
    private ?string $prepositionalCase = null;
    /**
     * @param string|null $nominativeCase
     *
     * @return static
     */
    public function setNominativeCase(?string $nominativeCase): static
    {
        $this->nominativeCase = $nominativeCase;
        return $this;
    }
    /**
     * @param string|null $genitiveCase
     *
     * @return static
     */
    public function setGenitiveCase(?string $genitiveCase): static
    {
        $this->genitiveCase = $genitiveCase;
        return $this;
    }
    /**
     * @param string|null $dativeCase
     *
     * @return static
     */
    public function setDativeCase(?string $dativeCase): static
    {
        $this->dativeCase = $dativeCase;
        return $this;
    }
    /**
     * @param string|null $accusativeCase
     *
     * @return static
     */
    public function setAccusativeCase(?string $accusativeCase): static
    {
        $this->accusativeCase = $accusativeCase;
        return $this;
    }
    /**
     * @param string|null $creativeCase
     *
     * @return static
     */
    public function setCreativeCase(?string $creativeCase): static
    {
        $this->creativeCase = $creativeCase;
        return $this;
    }
    /**
     * @param string|null $prepositionalCase
     *
     * @return static
     */
    public function setPrepositionalCase(?string $prepositionalCase): static
    {
        $this->prepositionalCase = $prepositionalCase;
        return $this;
    }
    /**
     * @return string|null
     */
    public function getNominativeCase(): ?string
    {
        return $this->nominativeCase;
    }
    /**
     * @return string|null
     */
    public function getGenitiveCase(): ?string
    {
        return $this->genitiveCase;
    }
    /**
     * @return string|null
     */
    public function getDativeCase(): ?string
    {
        return $this->dativeCase;
    }
    /**
     * @return string|null
     */
    public function getAccusativeCase(): ?string
    {
        return $this->accusativeCase;
    }
    /**
     * @return string|null
     */
    public function getCreativeCase(): ?string
    {
        return $this->creativeCase;
    }
    /**
     * @return string|null
     */
    public function getPrepositionalCase(): ?string
    {
        return $this->prepositionalCase;
    }
}
