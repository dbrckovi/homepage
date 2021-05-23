<?php

include_once("..\common.php");
include_once("..\database.php");

if (common::isGet())
{
    $id = common::getUrlValue('ID');
    echo database::getNotepadContent($id);
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
        echo 'Update '. $id;
    }
}
else if (common::isDelete())
{
    $id = common::getUrlValue('ID');
    echo 'Delete '. $id; 
}

?>