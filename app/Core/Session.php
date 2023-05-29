<?php declare(strict_types=1);

namespace App\Core;

class Session
{
    public static function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function put($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function flash($key, $value): void
    {
        $_SESSION['_flash'][$key] = $value;
    }

    public static function unflash()
    {
     unset($_SESSION['_flash']);
    }

    public static function destroy()
    {
        $_SESSION = [];
        session_destroy();
    }
}