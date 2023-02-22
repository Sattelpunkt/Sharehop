<?php

namespace App\Controller;

use App\Service\HomeService;

class HomeController
{
    public function indexAction(array $params = [], array $cleanUserData = [])
    {
        $s = new HomeService();
        $s->printHomeTemplate();
    }
}