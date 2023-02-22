<?php

namespace App\Repository;

use Core\Database;
use Core\H;

class AuthenticatorRepository
{
    public static function getPasswordByUsername(string $username)
    {
        $db = Database::getInstance();
        return $db->col($db->run('SELECT `password` FROM `accounts` WHERE `username` = :username', [':username' => $username]));
    }

    public static function getIDByUsername($username)
    {
        $db = Database::getInstance();
        return $db->col($db->run('SELECT `id` FROM `accounts` WHERE `username` = :username', [':username' => $username]));
    }

}