<?php
namespace Cookies;
class Cookie
{
    public static function set(string $name, $value):void
    {
        setCookie($name, $value, 0, '/');
    }

    public static function get(string $name)
    {
        return $_COOKIE['login'] ?? null;
    }
}