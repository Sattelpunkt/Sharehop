<?php

namespace App\Service;

use App\Repository\AuthenticatorRepository;
use Core\BaseService;
use Core\H;
use Core\Session;

class AuthenticatorService extends BaseService
{
    public function printLoginTemplate(): void
    {
        $this->response->setContentTemplate(get_class($this), 'Authenticator/UserLogin');
        $this->response->render();
    }

    public function checkLogin(array $loginData): int
    {
        $result = AuthenticatorRepository::getPasswordByUsername($loginData['username']);
        if (empty($result)) {
            return -1;
        }
        if (hash('sha512', $loginData['password']) == $result['password']) {
            return 1;
        } else {
            return -2;
        }
    }

    public function doLogin(string $username): void
    {
        Session::set('logginIn', TRUE);
        Session::set('userID', AuthenticatorRepository::getIDByUsername($username));
    }

    public function doLogout(): void
    {
        Session::delete('logginIn');
        Session::delete('userID');
    }

}