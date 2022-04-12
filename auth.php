<?php
use JetBrains\PhpStorm\Pure;

#[Pure] function getUserLogin()
{
    return $_COOKIE['login'] ?? null;
}