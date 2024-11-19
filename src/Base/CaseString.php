<?php

namespace MgermApiClasses\Base;

/** Объект строки, хранящий падежи */
class CaseString
{
    /**
     ** Именительный падеж
     * есть кто/что?
     * @var string|null
     */
    private ?string $nominativeCase = null;
    /**
     ** Родительный падеж
     * Нет кого/чего?
     * @var string|null
     */
    private ?string $genitiveCase = null;
    /**
     ** Дательный падеж
     * даю кому/чему?
     * @var string|null
     */
    private ?string $dativeCase = null;
    /**
     ** Винительный падеж
     * вижу кого/что?
     * @var string|null
     */
    private ?string $accusativeCase = null;
    /**
     ** Творительный падеж
     * горжусь кем/чем?
     * @var string|null
     */
    private ?string $creativeCase = null;
    /**
     ** Предложный падеж
     * думаю о ком/о чем?
     * @var string|null
     */
    private ?string $prepositionalCase = null;
    /**
     * @param string|null $nominativeCase
     *
     * @return static
     */
    public function setNominativeCase(?string $nominativeCase)
    {
        $this->nominativeCase = $nominativeCase;
        return $this;
    }
    /**
     * @param string|null $genitiveCase
     *
     * @return static
     */
    public function setGenitiveCase(?string $genitiveCase)
    {
        $this->genitiveCase = $genitiveCase;
        return $this;
    }
    /**
     * @param string|null $dativeCase
     *
     * @return static
     */
    public function setDativeCase(?string $dativeCase)
    {
        $this->dativeCase = $dativeCase;
        return $this;
    }
    /**
     * @param string|null $accusativeCase
     *
     * @return static
     */
    public function setAccusativeCase(?string $accusativeCase)
    {
        $this->accusativeCase = $accusativeCase;
        return $this;
    }
    /**
     * @param string|null $creativeCase
     *
     * @return static
     */
    public function setCreativeCase(?string $creativeCase)
    {
        $this->creativeCase = $creativeCase;
        return $this;
    }
    /**
     * @param string|null $prepositionalCase
     *
     * @return static
     */
    public function setPrepositionalCase(?string $prepositionalCase)
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
