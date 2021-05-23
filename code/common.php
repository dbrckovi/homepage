<?php
class common
{
    public static function getUrlValue($valueName)
    {
        if (isset($_GET[$valueName])) {
            return htmlspecialchars($_GET[$valueName]);
        } else return null;
    }

    public static function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public static function isDelete()
    {
        return $_SERVER['REQUEST_METHOD'] === 'DELETE';
    }
}
