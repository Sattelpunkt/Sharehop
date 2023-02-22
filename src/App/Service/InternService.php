<?php


namespace App\Service;

use Core\BaseService;

class InternService extends BaseService
{

    public function printInternTemplate(): void
    {
        $this->response->setContentTemplate(get_class($this), 'Home/intern');
        $this->response->render();
    }
}