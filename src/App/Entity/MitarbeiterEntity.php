<?php

namespace App\Entity;


use App\Trait\FirmaTrait;
use App\Trait\PersonTrait;

class MitarbeiterEntity
{
    use FirmaTrait, PersonTrait;

    private ?int $mitarbeiterID = NULL;
    private int $personID;
    private int $firmaID;

    /**
     * @return int
     */
    public function getMitarbeiterID(): ?int
    {
        return $this->mitarbeiterID;
    }

    /**
     * @param int $mitarbeiterID
     */
    public function setMitarbeiterID(int $mitarbeiterID): void
    {
        $this->mitarbeiterID = $mitarbeiterID;
    }

    /**
     * @return int
     */
    public function getPersonID(): int
    {
        return $this->personID;
    }

    /**
     * @param int $personID
     */
    public function setPersonID(int $personID): void
    {
        $this->personID = $personID;
    }

    /**
     * @return int
     */
    public function getFirmaID(): int
    {
        return $this->firmaID;
    }

    /**
     * @param int $firmaID
     */
    public function setFirmaID(int $firmaID): void
    {
        $this->firmaID = $firmaID;
    }


}

