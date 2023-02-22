<?php

namespace App\Trait;

trait PersonTrait
{
    private string $vorname;
    private string $nachname;
    private string $strasse;
    private int $plz;
    private string $ort;
    private string $telefon;
    private string $email;

    /**
     * @return string
     */
    public function getVorname(): string
    {
        return $this->vorname;
    }

    /**
     * @param string $vorname
     */
    public function setVorname(string $vorname): void
    {
        $this->vorname = $vorname;
    }

    /**
     * @return string
     */
    public function getNachname(): string
    {
        return $this->nachname;
    }

    /**
     * @param string $nachname
     */
    public function setNachname(string $nachname): void
    {
        $this->nachname = $nachname;
    }

    /**
     * @return string
     */
    public function getStrasse(): string
    {
        return $this->strasse;
    }

    /**
     * @param string $strasse
     */
    public function setStrasse(string $strasse): void
    {
        $this->strasse = $strasse;
    }

    /**
     * @return int
     */
    public function getPlz(): int
    {
        return $this->plz;
    }

    /**
     * @param int $plz
     */
    public function setPlz(int $plz): void
    {
        $this->plz = $plz;
    }

    /**
     * @return string
     */
    public function getOrt(): string
    {
        return $this->ort;
    }

    /**
     * @param string $ort
     */
    public function setOrt(string $ort): void
    {
        $this->ort = $ort;
    }

    /**
     * @return string
     */
    public function getTelefon(): string
    {
        return $this->telefon;
    }

    /**
     * @param string $telefon
     */
    public function setTelefon(string $telefon): void
    {
        $this->telefon = $telefon;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }




}