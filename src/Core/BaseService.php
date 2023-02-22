<?php

namespace Core;

use Core\BaseResponse;

class BaseService
{
    public object $response;

    public function __construct()
    {
        $this->response = new BaseResponse();
    }

}