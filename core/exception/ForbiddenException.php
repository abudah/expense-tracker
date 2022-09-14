<?php

namespace app\core\exception;

class ForbiddenException extends \Exception
{
    protected $message='You don\'t have permission to Access this page';
    protected $code=403;
}