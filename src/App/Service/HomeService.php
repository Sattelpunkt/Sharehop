<?php

namespace App\Service;

use Core\BaseService;

class HomeService extends BaseService
{
    public function printHomeTemplate(): void
    {
        $this->response->setContentTemplate(get_class($this), 'Home/index');
        $this->response->render();
    }

}