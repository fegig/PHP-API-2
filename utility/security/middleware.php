<?php

declare(strict_types=1);

require 'index.php';

class Middleware
{
    public static function securityCheck($next)
    {
        SecurityCheck::validateRequest();
        return $next();
    }
}