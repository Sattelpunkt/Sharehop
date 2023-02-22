<?php

namespace App\Middleware;

use Core\Router;
use Core\Session;

class LoginMiddleware
{
    private array $container = [];

    public function handle(): void
    {
        if (!Session::get('logginIn')) {
            Session::addMSG('danger','Du bist nicht eingeloggt!');
            Router::go('login');
        }
    }
}