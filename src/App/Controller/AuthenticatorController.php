<?php

namespace App\controller;

use App\Service\AuthenticatorService;
use Core\Router;
use Core\Session;

class AuthenticatorController
{
    public function loginAction(array $params = [], array $cleanUserData = [])
    {

        if (empty($cleanUserData['post'])) {
            $s = new AuthenticatorService();
            $s->printLoginTemplate();
        } else {
            $s = new AuthenticatorService();
            switch ($s->checkLogin($cleanUserData['post'])) {
                case 1:
                    $s->doLogin($cleanUserData['post']['username']);
                    Session::addMSG('success', "Erfolgreich eingeloggt");
                    Router::go('intern');
                    break;
                case -1:
                case -2:
                    Session::addMSG('danger', "Username/Password falsch");
                    Router::go('login');
                    break;
            }
        }
    }

    public function logoutAction(array $params = [], array $cleanUserData = [])
    {
        $s = new AuthenticatorService();
        $s->doLogout();
        Session::addMSG('success', "Erfolgreich ausgeloggt");
        Router::go('');
    }


}