<?php

namespace App\Trait;

trait FirmaTrait
{
    private int $firma_id;
    private string $name;

    /**
     * @return int
     */
    public function getFirmaId(): int
    {
        return $this->firma_id;
    }

    /**
     * @param int $firma_id
     */
    public function setFirmaId(int $firma_id): void
    {
        $this->firma_id = $firma_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}