<?php

namespace Core;

class Session
{

    public static function exists($name)
    {
        return isset($_SESSION[$name]);
    }

    public static function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        if (self::exists($name) && !empty($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return false;
    }

    public static function delete($name)
    {
        unset($_SESSION[$name]);
    }

    public static function addMSG($type, $msg)
    {
        if (isset($_SESSION['message'][$type])) {
            array_unshift($_SESSION['message'][$type], $msg);
        } else {
            $_SESSION['message'][$type][] = $msg;
        }
    }

    public static function getMSGs()
    {
        if (isset($_SESSION['message'])) {
            return $_SESSION['message'];
        } else {
            return [];
        }
    }

    public static function deleteMSGs()
    {
        unset($_SESSION['message']);
    }

}

