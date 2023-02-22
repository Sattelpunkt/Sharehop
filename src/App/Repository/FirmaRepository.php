<?php

namespace App\Repository;

use App\Entity\FirmaEntity;
use Core\Database;
use Core\H;

class FirmaRepository
{
    public static function getAll(): array
    {
        $db = Database::getInstance();
        $result = $db->row($db->run('SELECT * FROM `firma`'));
        $i = 0;
        $allFirmen = [];

        foreach ($result as $firma) {
            $allFirmen[$i] = new FirmaEntity();
            $allFirmen[$i]->setFirmaId($firma['firma_id']);
            $allFirmen[$i]->setName($firma['name']);
            $i++;
        }

        return $allFirmen;
    }
}