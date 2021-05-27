<?php

include_once("..\code\common.php");
include_once("..\code\database.php");

if (common::isGet())
{
    $id = common::getUrlValue('ID');

    if ($id === null)
    {
        $a = database::getNotepadItemNames();
        echo $a;  
    } 
    else echo database::getNotepadContent($id);
}
else if (common::isPost())
{
    $id = common::getUrlValue('ID');

    if ($id === null)
    {
        // create new
        echo 'Create new';
    }
    else
    {
        // update existing
        $contents = file_get_contents('php://input');
        database::SaveNotepadContent($id, $contents);
    }
}
else if (common::isDelete())
{
    $id = common::getUrlValue('ID');
    echo 'Delete '. $id; 
}

?>