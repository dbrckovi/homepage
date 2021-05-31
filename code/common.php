<?php
class common
{
    public const PAGE_NOTEPAD = "notepad";
    public const PAGE_SHOPPING = "shopping";
    public const PAGE_LISTS = "lists";
    public const PAGE_DEBUG = "debug";

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

    public static function isPageIDValid($pageID)
    {
        if (
            $pageID === common::PAGE_NOTEPAD
            || $pageID === common::PAGE_SHOPPING
            || $pageID === common::PAGE_LISTS
            || $pageID === common::PAGE_DEBUG
        ) return true;
        else return false;
    }
}
