<?php

namespace App\Repository;

use App\Entity\MitarbeiterEntity;
use Core\Database;
use Core\H;

class MitarbeiterRepository
{
    public static function getAllInterneMitarbeiter(): array
    {
        $db = Database::getInstance();
        $result = $db->row($db->run('SELECT * FROM `mitarbeiter` AS m JOIN `person` AS p ON p.person_id = m.person_id JOIN `firma` AS f ON f.firma_id = m.firma_id WHERE m.firma_id = 1'));
        $i = 0;
        $allMitarbeiter = [];

        foreach ($result as $mitarbeiter) {
            $allMitarbeiter[$i] = new MitarbeiterEntity();
            $allMitarbeiter[$i]->setMitarbeiterID($mitarbeiter['mitarbeiter_id']);
            $allMitarbeiter[$i]->setPersonID($mitarbeiter['person_id']);
            $allMitarbeiter[$i]->setFirmaID($mitarbeiter['firma_id']);
            $allMitarbeiter[$i]->setVorname($mitarbeiter['vorname']);
            $allMitarbeiter[$i]->setNachname($mitarbeiter['nachname']);
            $allMitarbeiter[$i]->setStrasse($mitarbeiter['strasse']);
            $allMitarbeiter[$i]->setPlz($mitarbeiter['plz']);
            $allMitarbeiter[$i]->setOrt($mitarbeiter['ort']);
            $allMitarbeiter[$i]->setTelefon($mitarbeiter['telefon']);
            $allMitarbeiter[$i]->setEmail($mitarbeiter['email']);
            $allMitarbeiter[$i]->setName($mitarbeiter['name']);
            $i++;
        }

        return $allMitarbeiter;
    }

    public static function getAllExterneMitarbeiter(): array
    {
        $db = Database::getInstance();
        $result = $db->row($db->run('SELECT * FROM `mitarbeiter` AS m JOIN `person` AS p ON p.person_id = m.person_id JOIN `firma` AS f ON f.firma_id = m.firma_id WHERE NOT m.firma_id = 1'));
        $i = 0;
        $allMitarbeiter = [];

        foreach ($result as $mitarbeiter) {
            $allMitarbeiter[$i] = new MitarbeiterEntity();
            $allMitarbeiter[$i]->setMitarbeiterID($mitarbeiter['mitarbeiter_id']);
            $allMitarbeiter[$i]->setPersonID($mitarbeiter['person_id']);
            $allMitarbeiter[$i]->setFirmaID($mitarbeiter['firma_id']);
            $allMitarbeiter[$i]->setVorname($mitarbeiter['vorname']);
            $allMitarbeiter[$i]->setNachname($mitarbeiter['nachname']);
            $allMitarbeiter[$i]->setStrasse($mitarbeiter['strasse']);
            $allMitarbeiter[$i]->setPlz($mitarbeiter['plz']);
            $allMitarbeiter[$i]->setOrt($mitarbeiter['ort']);
            $allMitarbeiter[$i]->setTelefon($mitarbeiter['telefon']);
            $allMitarbeiter[$i]->setEmail($mitarbeiter['email']);
            $allMitarbeiter[$i]->setName($mitarbeiter['name']);
            $i++;
        }

        return $allMitarbeiter;
    }

    public static function getOneMitarbeiter(int $id): MitarbeiterEntity
    {
        $db = Database::getInstance();
        $result = $db->col($db->run('SELECT * FROM `mitarbeiter` AS m JOIN `person` AS p ON p.person_id = m.person_id JOIN `firma` AS f ON f.firma_id = m.firma_id WHERE  m.mitarbeiter_id = :id', [':id' => $id]));
        if (!$result) {
            return new MitarbeiterEntity();
        }

        $mitarbeiter = new MitarbeiterEntity();
        $mitarbeiter->setMitarbeiterID($result['mitarbeiter_id']);
        $mitarbeiter->setPersonID($result['person_id']);
        $mitarbeiter->setFirmaID($result['firma_id']);
        $mitarbeiter->setVorname($result['vorname']);
        $mitarbeiter->setNachname($result['nachname']);
        $mitarbeiter->setStrasse($result['strasse']);
        $mitarbeiter->setPlz($result['plz']);
        $mitarbeiter->setOrt($result['ort']);
        $mitarbeiter->setTelefon($result['telefon']);
        $mitarbeiter->setEmail($result['email']);
        $mitarbeiter->setName($result['name']);

        return $mitarbeiter;
    }

    public static function getMitarbeiterEntityFromMitarbeiterArrayTemplate(array $mitarbeiter): MitarbeiterEntity
    {
        $objMitarbeiter = new MitarbeiterEntity();

        $objMitarbeiter->setFirmaID($mitarbeiter['firma']);
        $objMitarbeiter->setVorname($mitarbeiter['vorname']);
        $objMitarbeiter->setNachname($mitarbeiter['nachname']);
        $objMitarbeiter->setStrasse($mitarbeiter['strasse']);
        $objMitarbeiter->setPlz($mitarbeiter['plz']);
        $objMitarbeiter->setOrt($mitarbeiter['ort']);
        $objMitarbeiter->setTelefon($mitarbeiter['telefon']);
        $objMitarbeiter->setEmail($mitarbeiter['email']);

        return $objMitarbeiter;
    }

    public static function newMitarbeiter(MitarbeiterEntity $mitarbeiter): int
    {
        $db = Database::getInstance();
        $db->run('INSERT INTO `person` (vorname, nachname, strasse, plz, ort, telefon, email) VALUES (:vorname, :nachname, :strasse, :plz, :ort, :telefon, :email)',
            [':vorname' => $mitarbeiter->getVorname(), ':nachname' => $mitarbeiter->getNachname(), ':strasse' => $mitarbeiter->getStrasse(), ':plz' => $mitarbeiter->getPlz(), ':ort' => $mitarbeiter->getOrt(), ':telefon' => $mitarbeiter->getTelefon(), ':email' => $mitarbeiter->getEmail()]);
        $person_id = $db->getLastInsertID();
        $db->run('INSERT INTO `mitarbeiter` (person_id , firma_id) VALUES (:person_id, :firma_id)',[':person_id' => $person_id, ':firma_id' =>$mitarbeiter->getFirmaID()]);
        return $db->getLastInsertID();
    }

}