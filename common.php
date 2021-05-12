<?php
const PAGE_NOTEPAD = "notepad";
const PAGE_SHOPPING = "shopping";
const PAGE_LISTS = "lists";
const PAGE_INFO = "info";
const PAGE_DEBUG = "debug";

const TITLE_NOTEPAD = "Notepad";
const TITLE_SHOPPING = "Shopping";
const TITLE_LISTS = "Lists";
const TITLE_INFO = "PHP Info";
const TITLE_DEBUG = "Debug";

class common
{
    /**
        * Gets value of 'pageID' url parameter if current request has it. 
     * Otherwise, returns ID of the default page (notepad)
     */
    public static function getCurrentPageID()
    {
        $currentPageID = self::getUrlValue("pageID");
        if ($currentPageID == null) $currentPageID = PAGE_NOTEPAD;
        
        return $currentPageID;
    }

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
}
