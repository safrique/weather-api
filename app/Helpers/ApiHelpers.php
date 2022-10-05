<?php

namespace App\Helpers;

class ApiHelpers
{
    public static function isSuccessCode(int $code)
    : bool
    { return $code >= 200 && $code < 300; }
}
