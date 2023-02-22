<?php

namespace App\Controller;

use App\Service\InternService;

class InternController
{
    public function indexAction(array $params = [], array $cleanUserData = []): void
    {
        $s = new InternService();
        $s->printInternTemplate();
    }
}
